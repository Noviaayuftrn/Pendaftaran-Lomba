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
        Schema::create('donasi', function (Blueprint $table) {
            $table->id('ID_DONASI');
            $table->char('NAMA_PENDONASI', 25);
            $table->char('ALAMAT_PENDONASI', 30);
            $table->string('NO_TLPN_PENDONASI', 13);
            $table->bigInteger('JUMLAH_DONASI');
            $table->string('FOTO_BUKTI_TRANSFER');
            $table->date('TGL_DONASI');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
