<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('nombre_corto', 20);
            $table->string('imagen')->nullable();
            // primera forma
            $table->unsignedBigInteger('tipo_curso_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            // primera forma: creamos la llave foránea
            $table->foreign('tipo_curso_id')->references('id')->on('tipo_cursos');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
