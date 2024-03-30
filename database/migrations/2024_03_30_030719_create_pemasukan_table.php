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
        Schema::create('pemasukan', function (Blueprint $table) {
            $table->id('id_pemasukan'); // id_pemasukan
            $table->date('tgl_pemasukan');
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
        Schema::dropIfExists('pemasukan');
        Schema::table('pemasukan', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
        });
    }
};
