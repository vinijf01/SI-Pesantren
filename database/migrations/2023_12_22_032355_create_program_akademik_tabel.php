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
        Schema::create('program_akademik', function (Blueprint $table) {
            $table->id();
            $table->string('nama_program');
            $table->text('deskripsi_singkat');
            $table->text('deskripsi');
            $table->string('kategori');
            $table->string('logo')->nullable();
            $table->decimal('spp', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_akademik');
    }
};
