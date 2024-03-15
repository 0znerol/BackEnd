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
        Schema::create('attivitas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('thumb');
            $table->foreign('progetto_id')->on('progettos')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('progetto_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attivitas');
    }
};
