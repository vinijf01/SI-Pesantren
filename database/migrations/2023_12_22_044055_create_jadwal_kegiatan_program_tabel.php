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
        Schema::create('jadwal_kegiatan_program', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_program');
            $table->foreign('id_program')->references('id')->on('program_akademik')->onDelete('cascade');
            $table->string('jam');
            $table->string('kegiatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_kegiatan_program');
    }
};
