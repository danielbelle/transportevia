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
        Schema::create('form_inputs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('docRG');
            /*
            $table->string('docCPF');
            $table->string('period');
            $table->string('institution');
            $table->string('course');
            $table->string('month');
            $table->integer('timesInMonth');
            $table->string('city');
            $table->string('phone');
            $table->string('sign')->nullable(); // Caminho/URL da imagem PNG
            $table->string('signatureName')->nullable();
            $table->string('inputDocument'); // Caminho/URL do PDF enviado
            */
            $table->timestamps();
            $table->softDeletes(); // Soft delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_inputs');
    }
};
