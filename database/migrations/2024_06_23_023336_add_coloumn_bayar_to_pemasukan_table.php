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
            $table->string('bayar')->nullable()->after('total_harga');
            $table->enum('jenis_bayar', ['KREDIT', 'DEBET'])->nullable()->after('bayar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemasukan', function (Blueprint $table) {
            $table->dropColumn('bayar');
            $table->dropColumn('jenis_bayar');
        });
    }
};
