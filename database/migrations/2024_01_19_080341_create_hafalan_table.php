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
        Schema::create('hafalan', function (Blueprint $table) {
            $table->id();
            $table->string('id_santri', 255);
            $table->foreign('id_santri')->references('id_santri_fk')->on('users')->onDelete('cascade');
            $table->date('tanggal');
            $table->string('surat');
            $table->string('ayat');
            $table->string('total_hafalan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hafalan');
    }
};
