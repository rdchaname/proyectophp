<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaGrupos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 150);
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            // 1: nombre de la columna dentro de mi tabla => curso_id
            // 2: tabla padre => cursos
            // 3: llave primaria en la tabla padre => id
            $table->foreignId('curso_id')->constrained();
            // curso_id => curso, id => "cursos" , "id"
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
        Schema::dropIfExists('grupos');
    }
}
