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
        Schema::create('negosiasi_hargas', function (Blueprint $table) {
            $table->id('id_negosiasi');
            $table->foreignId('id_transaksi')->constrained('transaksis', 'id_transaksi');
            $table->foreignId('id_user_penawar')->constrained('users', 'id_user');
            $table->decimal('harga_tawaran', 15, 2);
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('negosiasi_hargas');
    }
};
