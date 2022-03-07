<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Logo;
use App\Models\Alici;
use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class LinkController extends Controller
{
    public function Linkolustur(Request $request){


        if ($request->isMethod('post'))
        {
            $slug = Str::slug($request->odemeadi." ".rand(0,99999999)." ".$request->fiyat."-".$request->parabirimi, '-');

            $link=Link::create([
                'odemeadi'=>$request->odemeadi,
                'fiyat'=>$request->fiyat,
                'parabirimi'=>$request->parabirimi,
                'slug'=>$slug,
                'aciklama'=>$request->aciklama,
                'tekkullan'=>$request->tekkullan ? 1 : 0,
                'tasitlisatis'=>$request->tasitlisatis ? 1 : 0,
                'aliciiletisim'=>$request->aliciiletisim ? 1 : 0,
                'updated_at'=>Carbon::now(),
                'created_at'=>Carbon::now(),
                'durum'=>0,
            ]);

            if($request->aliciiletisim==null){
                Alici::create([
                    'link_id'=>$link->id,
                    'aliciadi'=>$request->aliciadi,
                    'alicisoyad'=>$request->alicisoyad,
                    'aliciemail'=>$request->aliciemail,
                    'alicisehir'=>$request->alicisehir,
                    'aliciulke'=>$request->aliciulke,
                    'alicinumara'=>$request->alicinumara,
                    'aliciadres'=>$request->aliciadres,
                    'alicitc'=>$request->alicitc,

                ]);
            }
        }
        return view('Linkolustur');

    }
    public function Linklistele(Request $request){

        $liste=Link::with('icerik')->get();
        return view('LinkListe', compact('liste'));

    }
}
