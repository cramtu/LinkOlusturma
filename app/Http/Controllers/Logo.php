<?php

namespace App\Http\Controllers;

use App\Models\Ayar;
use Illuminate\Http\Request;

class Logo extends Controller
{
    public function getlogo(){
        $ayarlar=Ayar::get()->first();
        $logo=$ayarlar->resim;


        return $logo;
    }
}
