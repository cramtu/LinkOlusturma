<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Logo;
use Illuminate\Http\Request;
use App\Http\Controllers\Iyzico;


class OdemeController extends Controller
{


    public function odeme(Request $request){

        $iyzico= new Iyzico();

        $payment=$iyzico->
        setform([
            'conversationId'=>'123456789',
            'price'=>120.0,
            'paidPrice'=>126,
            'basketId'=>'SPT123456',
        ])
            ->setBuyer([
                'Id'=>123,
                'name'=>"DENEME",
                'surname'=>'DENEME',
                'phone'=>'05365148461',
                'email'=>'deneme@deneme.com',
                'tc'=>'12345678934',
                'address'=>'adres bu',
                'ip'=>'85.34.78.112',
                'city'=>'istanbul',
                'country'=>'turkiye'
            ])
            ->setShipping([
                'name'=>'kargo ad',
                'city'=>'istanbul',
                'country'=>'istanbul',
                'address'=>'adres',
            ])
            ->setBilling([
                'name'=>'kargo ad',
                'city'=>'istanbul',
                'country'=>'istanbul',
                'address'=>'adres',
            ])
            ->setItems([
                [
                    'id'=>9784,
                    'name'=>'urun adı',
                    'category'=>'urun kategorı',
                    'price'=>40.0,
                ],
                [
                    'id'=>9785,
                    'name'=>'urun adı',
                    'category'=>'urun kategorı',
                    'price'=>40.0,
                ],
                [
                    'id'=>9786,
                    'name'=>'urun adı',
                    'category'=>'urun kategorı',
                    'price'=>40.0,
                ],
            ])
            ->paymentForm();

        $logo= new Logo();
        $logo=$logo->getlogo();


        return view('odeme',[
            'paymentContent'=>$payment->getCheckoutFormContent(),
            'paymentStatus' =>$payment->getStatus(),
            'logo'=>$logo,
        ]);
    }
}
