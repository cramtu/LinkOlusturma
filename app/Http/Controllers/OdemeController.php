<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Logo;
use App\Models\Alici;
use App\Models\AlinanOdemeler;
use App\Models\Ayar;
use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Iyzico;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class OdemeController extends Controller
{


    public function odeme($id,Request $request){


        $liste=Link::with('icerik')->where('slug',$id)->get()->first();

        if($liste->durum!=3){

        if($liste->icerik==null || $liste->fiyat==null){

            if($request->has('fiyat')){

                $validated = $request->validate([
                    'aliciadi' => 'required',
                    'aliciemail' => 'required',
                    'alicitc' => 'required',
                    'alicisehir' => 'required',
                    'alicisoyad' => 'required',
                    'alicinumara' => 'required',
                    'aliciulke' => 'required',
                    'aliciadres' => 'required',

                ]);

                $request->session()->put('aliciadi', $request->aliciadi);
                $request->session()->put('aliciemail', $request->aliciemail);
                $request->session()->put('alicitc', $request->alicitc);
                $request->session()->put('alicisehir', $request->alicisehir);
                $request->session()->put('alicisoyad', $request->alicisoyad);
                $request->session()->put('alicinumara', $request->alicinumara);
                $request->session()->put('aliciulke', $request->aliciulke);
                $request->session()->put('aliciadres', $request->aliciadres);
                $request->session()->put('fiyat', $request->fiyat);


/*
                Alici::create([
                    'link_id'=>$id,
                    'aliciadi'=>$request->aliciadi,
                    'alicisoyad'=>$request->alicisoyad,
                    'aliciemail'=>$request->aliciemail,
                    'alicisehir'=>$request->alicisehir,
                    'aliciulke'=>$request->aliciulke,
                    'alicinumara'=>$request->alicinumara,
                    'aliciadres'=>$request->aliciadres,
                    'alicitc'=>$request->alicitc,

                ]);
*/
                //$liste=Link::with('icerik')->where('id',$id)->get()->first();


            }
            else{
            $ayar=Ayar::get()->first();
            return view('bilgial',[
                'liste'=>$liste,
                'ayar'=>$ayar,
            ]);
            }

        }

/*
        if($liste->fiyat==null){

            if($request->has('fiyat')){
             $data=Link::where('id',$id)->update([
                 'fiyat'=>intval($request->fiyat),
             ]);
                $liste=Link::with('icerik')->where('id',$id)->get()->first();
            }else{
                $ayar=Ayar::get()->first();
                return view('paraal',[
                    'liste'=>$liste,
                    'ayar'=>$ayar,
                ]);
            }

        }
*/
       // dd($liste);



        $iyzico= new Iyzico();

        $payment=$iyzico->
        setform([
            'conversationId'=>$id,//sistemdeki ıd zorunlu değil
            'price'=>$liste->fiyat ?? $request->session()->get('fiyat'),//urun tutari sepet tutarına eşit olmalı zorunlu
            'paidPrice'=>$liste->fiyat ?? $request->session()->get('fiyat'),//postan geçeçek nihai tutar zorunlu
            'basketId'=>$id,//sistemdeki sepet id zorunlu değil
            //'currency'=>$liste->parabirimi, //para tipi oto tl gidiyor zorunlu
            //'installment'=>'1'//Taksit bilgisi, tek çekim için 1 gönderilmelidir. Geçerli değerler: 1, 2, 3, 6, 9, 12 zorunlu
        ])
            //alıcı bilgi
            ->setBuyer([
                'Id'=>$liste->icerik->id ?? Session::getId(),//alıcı id  burası tamamen zorunlu
                'name'=>$liste->icerik->aliciadi ?? $request->session()->get('aliciadi'),//alıcı adı
                'surname'=>$liste->icerik->alicisoyad ?? $request->session()->get('alicisoyad'),//alıcı soyad
                'phone'=>$liste->icerik->alicinumara ??  $request->session()->get('alicinumara'),//alıcı telefon
                'email'=>$liste->icerik->aliciemail ?? $request->session()->get('aliciemail'),//alıcı mail
                'tc'=>$liste->icerik->alicitc ?? $request->session()->get('alicitc'),//alıcı tc
                'address'=>$liste->icerik->aliciadres ??   $request->session()->get('aliciadres'),//alıcı adres
                'ip'=>$request->ip(),//alıcı ıp
                'city'=>$liste->icerik->alicisehir ??  $request->session()->get('alicisehir'),//alıcı ulke
                'country'=>$liste->icerik->aliciulke ?? $request->session()->get('aliciulke'),//alıcı şehir
            ])

            //kargo
            ->setShipping([
                'name'=>'kargo ad',
                'city'=>'istanbul',
                'country'=>'istanbul',
                'address'=>'adres',
            ])
            //fatura
            ->setBilling([
                'name'=>'kargo ad',
                'city'=>'istanbul',
                'country'=>'istanbul',
                'address'=>'adres',
            ])
            //urunler
            ->setItems([
                [
                    'id'=>$id,
                    'name'=>'urun adı',
                    'category'=>'urun kategorı',
                    'price'=>$liste->fiyat ?? $request->session()->get('fiyat'),
                ]
            ])
            ->paymentForm();





         $ayar=Ayar::get()->first();


        return view('odeme',[
            'paymentContent'=>$payment->getCheckoutFormContent(),
            'ayar'=>$ayar,
        ]);
    }
    }

    public function callback(Request $request){

        $ayar=Ayar::get()->first();

        $token=$request->token;
        $conversationId="123456789";
        $iyzico= new Iyzico();
        $response = $iyzico->callbackForm($token,$conversationId);

        //dd(json_decode($response->getrawResult()));

        if($response->getPaymentStatus()=='SUCCESS'){

            $link= Link::with('icerik')->where('slug',$response->getbasketId())->get()->first();



            $link->update([
                'durum'=>1,
            ]);

            if (isset($link->icerik)){

                AlinanOdemeler::create([
                   'link_id'=>$link->id,
                    'aliciadi'=>$link->icerik->aliciadi,
                    'alicisoyad'=>$link->icerik->alicisoyad,
                    'aliciemail'=>$link->icerik->aliciemail,
                    'alicitc'=>$link->icerik->alicitc,
                    'alicinumara'=>$link->icerik->alicinumara,
                    'alicisehir'=>$link->icerik->alicisehir,
                    'aliciulke'=>$link->icerik->aliciulke,
                    'aliciadres'=>$link->icerik->aliciadres,
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                    'para'=>$link->fiyat ??  $request->session()->get('fiyat'),
                    'alici_id'=>$liste->icerik->id ?? Session::getId(),
                    'bilgileri_kim_girdi'=>0,
                ]);
            }else{

                AlinanOdemeler::create([
                    'link_id'=>$link->id,
                    'aliciadi'=> $request->session()->get('aliciadi'),
                    'alicisoyad'=> $request->session()->get('alicisoyad'),
                    'aliciemail'=>$request->session()->get('aliciemail'),
                    'alicitc'=> $request->session()->get('alicitc'),
                    'alicinumara'=> $request->session()->get('alicinumara'),
                    'alicisehir'=> $request->session()->get('alicisehir'),
                    'aliciulke'=> $request->session()->get('aliciulke'),
                    'aliciadres'=>$request->session()->get('aliciadres'),
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                    'para'=>$link->fiyat ??  $request->session()->get('fiyat'),
                    'alici_id'=>$liste->icerik->id ?? Session::getId(),
                    'bilgileri_kim_girdi'=>1,
                ]);


            }





            if($link->tekkullan==1){
                Link::where('id',$response->getbasketId())->update([
                    'durum'=>3,
                ]);
            }






        }

        return view('callback',[
            'paymentStatus' =>$response->getPaymentStatus(),
            'ayar'=>$ayar,
        ]);
    }

}
