<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientesReceitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredientes_receita', function (Blueprint $table) {
            $table->id();
            $table->integer('ordem');
            $table->foreignId('receita_id')->constrained('receitas');
            $table->foreignId('ingrediente_id')->constrained('ingredientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredientes_receita');
    }
}
