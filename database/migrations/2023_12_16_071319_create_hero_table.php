<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up()
    {
        Schema::create('hero', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 100)->default('Selamat Datang Di');
            $table->text('isi')->default('Pesantren Abdurrahman Bin Auf');
            $table->string('image', 255)->default('assets/img/hero/default-hero.jpg');
            $table->text('link_fb')->nullable();
            $table->text('link_ig')->nullable();
            $table->text('link_yt')->nullable();
            $table->string('keterangan_tombol', 50)->default('Selengkapnya');
            $table->text('link_btn')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('hero');
    }
};
