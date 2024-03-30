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
            $table->unsignedBigInteger('id_mitra');
            $table->foreign('id_mitra')->references('id_mitra')->on('mitra')->after('id_detail_pemasukan');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_pemasukan_tabel', function (Blueprint $table) {
            // If exists, drop foreign key constraint on `users` table before dropping column
            if (Schema::hasColumn('detail_pemasukan_tabel', 'id_mitra')) {
                $table->dropForeign(['id_mitra']);
                $table->dropColumn('id_mitra');
            }
        });
    }
};
