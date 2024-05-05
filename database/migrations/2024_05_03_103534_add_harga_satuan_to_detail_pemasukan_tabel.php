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
            $table->integer('bayar')->after('saldo');
            $table->integer('total')->after('subtotal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_pemasukan_tabel', function (Blueprint $table) {
            $table->dropColumn('bayar');
            $table->dropColumn('total');
        });
    }
};
