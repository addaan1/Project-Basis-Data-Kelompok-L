<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/..._create_petanis_table.php

    public function up()
    {
        Schema::create('petanis', function (Blueprint $table) {
            $table->id(); // Primary Key untuk tabel petani
            $table->string('nama');
            $table->string('lokasi');
            $table->string('kontak');
            $table->integer('kapasitas_panen');
            
            // Membuat kolom id_user sebagai Foreign Key (FK)
            // 'constrained' akan otomatis menghubungkannya ke PK di tabel 'users'
            $table->foreignId('id_user')->constrained('users', 'id_user');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petanis');
    }
};
