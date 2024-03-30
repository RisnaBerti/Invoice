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
        Schema::create('detail_pemasukan', function (Blueprint $table) {
            $table->id('id_detail_pemasukan');
            $table->unsignedBigInteger('id_pemasukan'); // Ensure it's unsigned
            $table->foreign('id_pemasukan')->references('id_pemasukan')->on('pemasukan');
            $table->string('jenis_pemasukan');
            $table->string('nama_barang_masuk');
            $table->integer('jumlah_barang_masuk');
            $table->integer('harga_barang_masuk');
            $table->enum('saldo', ['debet', 'kredit']);
            $table->string('keterangan');
            $table->integer('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pemasukan');
        Schema::table('detail_pemasukan', function (Blueprint $table) {
            $table->dropForeign(['id_pemasukan']);
        });
    }
};
