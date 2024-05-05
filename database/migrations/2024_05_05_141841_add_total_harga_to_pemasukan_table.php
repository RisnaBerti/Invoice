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
        Schema::table('pemasukan', function (Blueprint $table) {            
            // $table->integer('total_harga')->after('tgl_pemasukan');
            // $table->unsignedBigInteger('id_mitra');
            // $table->foreign('id_mitra')->references('id_mitra')->on('mitra')->after('id_pemasukan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemasukan', function (Blueprint $table) {
            // $table->dropColumn('total_harga');
            // $table->dropForeign(['id_mitra']);
            // $table->dropColumn('id_mitra');
        });
    }
};
