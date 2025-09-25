<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/..._create_users_table.php

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // id_user sebagai Primary Key (PK) auto-increment
            $table->id('id_user'); 
            
            // Kolom nama (tipe VARCHAR)
            $table->string('nama'); 
            
            // Kolom peran dengan tipe ENUM, hanya menerima nilai yang ditentukan
            $table->enum('peran', ['petani', 'pengepul', 'distributor', 'pasar', 'admin']); 
            
            // Kolom email yang harus unik
            $table->string('email')->unique();
            
            $table->timestamp('email_verified_at')->nullable();
            
            // Kolom password yang akan di-hash
            $table->string('password'); 
            
            $table->rememberToken();
            
            // Otomatis membuat kolom created_at dan updated_at
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
