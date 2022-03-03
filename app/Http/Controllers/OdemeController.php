<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Logo;
use App\Models\Ayar;
use Illuminate\Http\Request;
use App\Http\Controllers\Iyzico;


class OdemeController extends Controller
{


    public function odeme($id,Request $request){



        $iyzico= new Iyzico();

        $payment=$iyzico->
        setform([
            'conversationId'=>'123456789',//sistemdeki ıd zorunlu değil
            'price'=>40.0,//urun tutari sepet tutarına eşit olmalı zorunlu
            'paidPrice'=>40,//postan geçeçek nihai tutar zorunlu
            'basketId'=>'SPT123456',//sistemdeki sepet id zorunlu değil
            //'currency'=>'Tl'//para tipi oto tl gidiyor zorunlu
            //'installment'=>'1'//Taksit bilgisi, tek çekim için 1 gönderilmelidir. Geçerli değerler: 1, 2, 3, 6, 9, 12 zorunlu
        ])
            //alıcı bilgi
            ->setBuyer([
                'Id'=>123,//alıcı id  burası tamamen zorunlu
                'name'=>"DENEME",//alıcı adı
                'surname'=>'DENEME',//alıcı soyad
                'phone'=>'05365148461',//alıcı telefon
                'email'=>'deneme@deneme.com',//alıcı mail
                'tc'=>'12345678934',//alıcı tc
                'address'=>'adres bu',//alıcı adres
                'ip'=>'85.34.78.112',//alıcı ıp
                'city'=>'istanbul',//alıcı ulke
                'country'=>'turkiye'//alıcı şehir
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
                    'id'=>9784,
                    'name'=>'urun adı',
                    'category'=>'urun kategorı',
                    'price'=>40.0,
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

        $logo= new Logo();
        $logo=$logo->getlogo();

        $token=$request->token;
        $conversationId="123456789";
        $iyzico= new Iyzico();
        $response = $iyzico->callbackForm($token,$conversationId);

        return view('odeme',[
            'paymentStatus' =>$response->getPaymentStatus(),
            'logo'=>$logo,
        ]);
    }
}
