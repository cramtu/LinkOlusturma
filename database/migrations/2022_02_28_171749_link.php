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

        Schema::create('link', function (Blueprint $table) {
            $table->id();
            $table->string('odemeadi');
            $table->integer('fiyat')->nullable();
            $table->string('parabirimi');
            $table->boolean('durum');
            $table->string('slug');
            $table->longText('aciklama');
            $table->boolean('tekkullan');
            $table->boolean('tasitlisatis');
            $table->boolean('aliciiletisim');
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
