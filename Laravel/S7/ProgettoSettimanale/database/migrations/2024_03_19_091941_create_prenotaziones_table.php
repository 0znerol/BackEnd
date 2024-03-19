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
        Schema::create('prenotaziones', function (Blueprint $table) {
            $table->id();
            $table->foreign('corso_id')->on('corsos')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('corso_id');
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id');
            $table->enum('stato', ['in attesa', 'confermata', 'rifiutata']);
            $table->enum('orario', ['09:00', '14:00', '18:00', '20:00']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prenotaziones');
    }
};
