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
            $table->unsignedBigInteger('id_mitra')->after('id_pemasukan')->nullable();
            $table->foreign('id_mitra')->references('id_mitra')->on('mitra')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemasukan', function (Blueprint $table) {
            $table->dropForeign(['id_mitra']);
            $table->dropColumn('id_mitra');
        });
    }
};
