<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartorios', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable();
            $table->string('razao')->nullable();
            $table->unsignedInteger('tipo_documento')->nullable();
            $table->string('documento')->nullable();
            $table->string('cep')->nullable();
            $table->string('endereco')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf')->nullable();
            $table->string('tabeliao')->nullable();
            $table->char('ativo', 2)->nullable();
            $table->unsignedInteger('user_id');
            $table->foreign('tipo_documento')
                ->references('id')
                ->on('tipo_documentos');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
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
        Schema::dropIfExists('cartorios');
    }
}
