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
        Schema::table('transaksis', function (Blueprint $table) {
            $table->string('hari')->nullable()->after('bukti_bayar');
            $table->string('range_jam')->nullable()->after('hari');
            $table->string('status')->nullable()->after('range_jam');
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->removeColumn('hari');
            $table->removeColumn('range_jam');
            $table->removeColumn('status');
            $table->removeColumn('user_id');
        });
    }
};
