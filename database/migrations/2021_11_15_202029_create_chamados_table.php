<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChamadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamados', function (Blueprint $table) { // O comando php artisan make:migration create_chamados_table cria no banco de dados do arquivo .env uma tabela chamado chamados
            $table->id(); // Cria um id auto incrementado na tabela 
            $table->string('assunto',100); // Cria um varchar de 100 caracteres na tabela
            $table->string('categoria',100); // Cria um varchar de 100 caracteres na tabela
            $table->text('descricao'); // Cria uma coluna do tipo text
            $table->integer('loja'); // cria um inteiro 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chamados');
    }
}
