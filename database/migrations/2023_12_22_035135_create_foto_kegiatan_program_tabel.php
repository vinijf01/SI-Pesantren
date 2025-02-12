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
        Schema::create('foto_kegiatan_program', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_program');
            $table->foreign('id_program')->references('id')->on('program_akademik')->onDelete('cascade');
            $table->string('foto');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto_kegiatan_program');
    }
};
