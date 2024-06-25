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
        Schema::create('buat_surat', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nomor_surat');
            $table->date('tanggal_surat');
            $table->string('tujuan');
            $table->string('perihal');
            $table->string('isi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buat_surat');
    }
};
