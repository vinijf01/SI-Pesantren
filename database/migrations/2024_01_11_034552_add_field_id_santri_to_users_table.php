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
        Schema::table('users', function (Blueprint $table) {
            // $table->string('id_santri', 255);
            $table->string('id_santri_fk', 255)->after('id')->nullable();
            $table->foreign('id_santri_fk')->references('id_santri')->on('santri')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id_santri']);  // Drop the foreign key constraint first
            $table->dropColumn('id_santri_fk');
        });
    }
};
