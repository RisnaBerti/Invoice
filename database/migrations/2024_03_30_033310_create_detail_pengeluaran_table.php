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
        Schema::create('detail_pengeluaran', function (Blueprint $table) {
            $table->id('id_detail_pengeluaran');
            $table->unsignedBigInteger('id_pengeluaran'); // Ensure it's unsigned
            $table->foreign('id_pengeluaran')->references('id_pengeluaran')->on('pengeluaran');
            $table->string('nama_barang');
            $table->integer('jumlah_barang_pengeluaran');
            $table->integer('harga_satuan');
            $table->integer('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pengeluaran');
        Schema::table('detail_pengeluaran', function (Blueprint $table) {
            $table->dropForeign(['id_pengeluaran']);
        });
    }
};
