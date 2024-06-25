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
        Schema::create('disposisi', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('surat_masuk_id');
            $table->string('tujuan');
            $table->text('isi');
            $table->date('batas_waktu');
            $table->string('sifat');

            $table->foreign('surat_masuk_id')->references('id')->on('surat_masuks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disposisi');
    }
};
