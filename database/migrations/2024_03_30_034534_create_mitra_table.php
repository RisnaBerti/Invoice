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
        Schema::create('mitra', function (Blueprint $table) {
            $table->id('id_mitra');
            $table->string('nama_mitra');
            $table->string('alamat_mitra');
            $table->string('no_telp_mitra');
            $table->string('email_mitra');
            $table->string('jenis_mitra');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitra');
    }
};
