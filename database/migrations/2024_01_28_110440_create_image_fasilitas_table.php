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
        Schema::create('image_fasilitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_fasilitas');
            $table->foreign('id_fasilitas')->references('id')->on('fasilitas')->onDelete('cascade');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_fasilitas');
    }
};
