<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alici_bilgileri', function (Blueprint $table) {
            $table->id();
            $table->integer('link_id');
            $table->string('aliciadi');
            $table->string('alicisoyad');
            $table->string('aliciemail');
            $table->integer('alicitc');
             $table->string('alicinumara');
            $table->string('alicisehir');
            $table->string('aliciulke');
             $table->longText('aliciadres');
            $table->timestamps();
            $table->dateTime('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
