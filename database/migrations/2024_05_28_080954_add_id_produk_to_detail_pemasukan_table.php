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
        Schema::table('detail_pemasukan', function (Blueprint $table) {
            // $table->unsignedBigInteger('id_produk');
            // $table->foreign('id_produk')->references('id_produk')->on('produk')->after('id_detail_pemasukan');
            
            $table->unsignedBigInteger('id_produk')->after('id_detail_pemasukan')->nullable();
            $table->foreign('id_produk')->references('id_produk')->on('produk')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_pemasukan', function (Blueprint $table) {
            $table->dropForeign(['id_produk']);
            $table->dropColumn('id_produk');
        });
    }
};
