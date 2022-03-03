<?php

namespace App\Http\Controllers;

use App\Models\Ayar;
use Illuminate\Http\Request;
use App\Http\Controllers\Logo;

class AyarlarController extends Controller
{
    public function ayarlar(Request $request){

        $ayar=Ayar::get()->first();


        if ($request->isMethod('post'))
        {
            if (isset($request->resim)) {

                $resimname= rand() . '.' . $request->resim->getClientOriginalExtension();

                $request->resim->move(('images/logo'), $resimname);

                $imageupload=Ayar::where('id',$ayar->id)->update([
                    'resim'=>$resimname,
                ]);
            }

            Ayar::where('id',$ayar->id)->update([
                'setApiKey'=>$request->setApiKey,
                'setSecretKey'=>$request->setSecretKey,
                'setBaseUrl'=>$request->setBaseUrl,
                'siteadi'=>$request->siteadi,
            ]);



            $ayar=Ayar::get()->first();

        }



        return view('ayar',compact('ayar'));
    }
}
