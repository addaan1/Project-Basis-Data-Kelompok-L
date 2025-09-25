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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id('id_inventory');
            $table->integer('jumlah');
            $table->date('tanggal_masuk');
            // 'nullable' berarti kolom ini boleh kosong
            $table->date('tanggal_keluar')->nullable(); 
            $table->foreignId('id_user')->constrained('users', 'id_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
