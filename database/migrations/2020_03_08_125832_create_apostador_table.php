<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApostadorTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('apostador', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('apelido')->nullable;            
            $table->timestamps();
        });
         Schema::create('organizacao', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->timestamps();
        });
        
        Schema::create('apostador_organizacao', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('apostador_id')->unsigned();
            $table->integer('organizacao_id')->unsigned();       


            $table->foreign('apostador_id')
                    ->references('id')
                    ->on('apostador')
                    ->onDelete('cascade');

            $table->foreign('organizacao_id')
                    ->references('id')
                    ->on('organizacao')
                    ->onDelete('cascade');
        });
        Schema::create('apostador_grupo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('apostador_id')->unsigned();
            $table->integer('grupo_id')->unsigned();
            
             $table->foreign('apostador_id')
                    ->references('id')
                    ->on('apostador')
                    ->onDelete('cascade');

            $table->foreign('grupo_id')
                    ->references('id')
                    ->on('grupo')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        
        Schema::dropIfExists('apostador_grupo');
        Schema::dropIfExists('apostador_organizacao');
        Schema::dropIfExists('organizacao');
        Schema::dropIfExists('apostador');
        Schema::dropIfExists('grupo');
    }

}
