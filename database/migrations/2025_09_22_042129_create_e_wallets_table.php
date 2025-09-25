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
        Schema::create('e_wallets', function (Blueprint $table) {
            $table->id('id_wallet');
            // Tipe 'decimal' cocok untuk menyimpan data keuangan
            $table->decimal('saldo', 15, 2); 
            $table->foreignId('id_user')->constrained('users', 'id_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_wallets');
    }
};
