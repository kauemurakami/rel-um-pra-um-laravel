<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            # criando campo que será pk 
            $table->unsignedBigInteger('cliente_id')->unsigned();
            # criando constraint
            $table->foreign('cliente_id')->references('id')->on('clientes');
            # tranformando cliente_id em chave primaria
            $table->primary('cliente_id');
            $table->string('rua');
            $table->smallInteger('numero');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf');
            $table->string('cep');
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
        Schema::dropIfExists('enderecos');
    }
}
