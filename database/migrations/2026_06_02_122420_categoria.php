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

        Schema::create('categorias', function (Blueprint $table) {
            $table->id();                    // ID único (chave primária)
            $table->string('tipo');          // Tipo da categoria (ex: "Cimento", "Tinta", etc.)
            $table->string('aplicacao');
            $table->timestamps();            // created_at e updated_at
        });

        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
