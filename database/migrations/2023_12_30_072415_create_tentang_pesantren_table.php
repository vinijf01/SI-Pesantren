<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('tentang_pesantren', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 200)->index(); // Tambah index untuk optimasi pencarian
            $table->text('deskripsi'); // Pastikan sesuai kebutuhan (bisa juga longText)
            $table->string('foto', 255)->nullable();
            $table->string('keterangan_video', 255)->nullable();
            $table->string('link_video', 500)->nullable(); // Jika video dari YouTube, 500 cukup
            $table->timestamps();
        });
    }

    /**
     * Rollback migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('tentang_pesantren');
    }
};
