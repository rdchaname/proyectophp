<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaMatriculas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->enum('estado', ['Retirado', 'Activo', 'Suspendido']);
            $table->timestamps();
            $table->foreignId('persona_id')->constrained();
            $table->foreignId('grupo_id')->constrained();
            $table->foreignId('rol_id')->constrained('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriculas');
    }
}
