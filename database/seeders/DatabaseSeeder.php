<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'deneme',
            'email'=>'deneme@deneme.com',
            'password'=>Hash::make(123456789),
        ]);

        DB::table('ayar')->insert([
            'resim'=>'logo.svg',
            'setApiKey'=>'sandbox-bJy1xjsHAG97HEZjTPVINISuw2C3dYs6',
            'setSecretKey'=>'sandbox-6ZLCK0HOPKXYfmRV4oHftWLJZvj1Vn2O',
            'setBaseUrl'=>'https://sandbox-api.iyzipay.com',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);

    }
}
