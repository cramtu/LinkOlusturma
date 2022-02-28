<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alici extends Model
{
    use HasFactory;

    protected $table = "alici_bilgileri";
    protected $guarded = [];

}
