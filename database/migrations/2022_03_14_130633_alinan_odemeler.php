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
        Schema::create('alinan_odemeler', function (Blueprint $table) {
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
            $table->string('alici_id');
            $table->string('bilgileri_kim_girdi');
            $table->integer('para');

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
