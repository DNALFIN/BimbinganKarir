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
        Schema::create('periksas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_janji_periksa')->constrained('janji_periksas')->onDelete('cascade');
            $table->datetime('tgl_periksa');
            $table->string('catatan');
            $table->string('obat')->nullable();
            $table->integer('harga_obat')->nullable();
            $table->integer('biaya_periksa');
            $table->integer('total_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periksas');
    }
};
