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
        Schema::create('hero', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->default('Selamat Datang Di');
            $table->text('isi')->default('Pesantren Abdurrahman Bin Auf');
            $table->string('image')->default('assets/img/hero/default.jpg');
            $table->string('link_fb')->default('#');
            $table->string('link_ig')->default('#');
            $table->string('link_yt')->default('#');
            $table->string('keterangan_tombol')->default('Selengkapnya');
            $table->string('link_btn')->default('#');
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hero');
    }
};
