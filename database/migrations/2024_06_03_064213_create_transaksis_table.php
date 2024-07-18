<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->nullable();
            $table->foreignId('paket_id')->nullable()->constrained('pakets')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('instruktur_id')->nullable()->constrained('users')->nullOnDelete()->cascadeOnUpdate();
            $table->date('tgl_transaksi')->nullable();
            $table->string('status_transaksi')->nullable();
            $table->date('tgl_mulai')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->time('jam')->nullable();
            $table->text('catatan')->nullable();
            $table->date('tgl_bayar')->nullable();
            $table->string('bukti_bayar')->nullable();
            $table->string('kelas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
