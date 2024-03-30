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
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->id('id_pengeluaran'); // id_pengeluaran
            $table->date('tgl_pengeluaran');
            $table->unsignedBigInteger('id_user'); // Ensure it's unsigned
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluaran');
        Schema::table('pengeluaran', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
        });
    }
};
