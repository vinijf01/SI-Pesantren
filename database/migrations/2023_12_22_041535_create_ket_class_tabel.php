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
        Schema::create('ket_class', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_program');
            $table->foreign('id_program')->references('id')->on('program_akademik')->onDelete('cascade');
            $table->string('judul_1');
            $table->text('deskripsi_judul_1');
            $table->string('judul_2');
            $table->text('deskripsi_judul_2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ket_class');
    }
};
