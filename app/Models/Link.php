<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "link";
    protected $guarded = [];


    public function icerik() {
        return $this->hasOne('App\Models\Alici', 'link_id', 'id');
    }



}
