<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('santri', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_program');
            $table->foreign('id_program')->references('id')->on('program_akademik');
            $table->string('id_santri', 255)->unique();
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('no_wa');
            $table->integer('usia');
            $table->string('sk_sekolah')->nullable();
            $table->string('kk');
            $table->string('akta');
            $table->string('ktp');
            $table->string('pasphoto');
            $table->string('raport');
            $table->enum('status', ['Diterima', 'Lolos', 'Gagal'])->default('Diterima');
            $table->string('TA')->nullable();
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santri');
    }
};
