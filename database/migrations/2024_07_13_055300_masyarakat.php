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
        Schema::create('masyarakat', function (Blueprint $table) {
            $table->id('ID_MASYARAKAT');
            $table->string('NAMA', 25);
            $table->string('UMUR', 3);
            $table->string('ALAMAT', 30);
            $table->string('JENIS_KELAMIN', 1);
            $table->string('NOMOR_TELPON');
            $table->date('TANGGAL_PENDAFTARAN');
            $table->string('ID_LOMBA', 11);
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
