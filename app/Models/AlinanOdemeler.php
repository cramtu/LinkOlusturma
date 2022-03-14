<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlinanOdemeler extends Model
{
    use HasFactory;

    protected $table = "alinan_odemeler";
    protected $guarded = [];


    public function icerik() {
        return $this->hasOne('App\Models\Link', 'id', 'link_id');
    }



}
