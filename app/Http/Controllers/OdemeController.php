<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Logo;
use App\Models\Ayar;
use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Iyzico;


class OdemeController extends Controller
{


    public function odeme($id,Request $request){

        $liste=Link::with('icerik')->where('id',$id)->get()->first();


        $iyzico= new Iyzico();

        $payment=$iyzico->
        setform([
            'conversationId'=>$id,//sistemdeki ıd zorunlu değil
            'price'=>$liste->fiyat,//urun tutari sepet tutarına eşit olmalı zorunlu
            'paidPrice'=>$liste->fiyat,//postan geçeçek nihai tutar zorunlu
            'basketId'=>$id,//sistemdeki sepet id zorunlu değil
            //'currency'=>'Tl'//para tipi oto tl gidiyor zorunlu
            //'installment'=>'1'//Taksit bilgisi, tek çekim için 1 gönderilmelidir. Geçerli değerler: 1, 2, 3, 6, 9, 12 zorunlu
        ])
            //alıcı bilgi
            ->setBuyer([
                'Id'=>$liste->icerik->id,//alıcı id  burası tamamen zorunlu
                'name'=>$liste->icerik->aliciadi,//alıcı adı
                'surname'=>$liste->icerik->alicisoyad,//alıcı soyad
                'phone'=>$liste->icerik->alicinumara,//alıcı telefon
                'email'=>$liste->icerik->aliciemail,//alıcı mail
                'tc'=>$liste->icerik->alicitc,//alıcı tc
                'address'=>$liste->icerik->aliciadres,//alıcı adres
                'ip'=>$request->ip(),//alıcı ıp
                'city'=>$liste->icerik->alicisehir,//alıcı ulke
                'country'=>$liste->icerik->aliciulke,//alıcı şehir
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
                    'price'=>$liste->fiyat,
                ]
            ])
            ->paymentForm();

         $ayar=Ayar::get()->first();


        return view('odeme',[
            'paymentContent'=>$payment->getCheckoutFormContent(),
            'ayar'=>$ayar,
        ]);
    }

    public function callback(Request $request){

        $ayar=Ayar::get()->first();

        $token=$request->token;
        $conversationId="123456789";
        $iyzico= new Iyzico();
        $response = $iyzico->callbackForm($token,$conversationId);

        if($response->getPaymentStatus()=='SUCCESS'){
            Link::where('id',$response->getbasketId())->update([
                'durum'=>1,
            ]);
        }

        return view('odeme',[
            'paymentStatus' =>$response->getPaymentStatus(),
            'ayar'=>$ayar,
        ]);
    }
}
