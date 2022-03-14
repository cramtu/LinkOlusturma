<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Logo;
use App\Models\Alici;
use App\Models\AlinanOdemeler;
use App\Models\Ayar;
use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\Concerns\Has;


class LinkController extends Controller
{
    public function Linkolustur(Request $request){

        if ($request->isMethod('post'))
        {

            $slug = time().rand(0,999999)+rand(0,999);

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

    public function Odemeler(Request $request)
    {
        $litsq=AlinanOdemeler::with('icerik');

        $liste=$litsq->paginate(30);

        return view('Odemeler', compact('liste'));
    }
}
