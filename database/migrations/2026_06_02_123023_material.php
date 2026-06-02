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

        Schema::create('materiais', function (Blueprint $table) {
				$table->id();                                           // ID único
				$table->string('fabricante'); 
                $table->string('unidade_de_medida'); 
                $table->string('cor'); 
                $table->string('textura'); 
                $table->string('material_de_fabricacao');
                $table->string('peso');
                $table->string('data_de_validade');
                $table->string('quantidade_em_estoque');
                                                
				
                $table->foreignId('categorias_id')                      // Chave estrangeira
					->constrained()                                   // Referencia tabela categorias
					->onDelete('cascade');                            // Deleta posts quando categoria é deletada
				$table->timestamps();                                   // created_at e updated_at
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
