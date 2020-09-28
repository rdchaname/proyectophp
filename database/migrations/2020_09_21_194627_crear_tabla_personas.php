<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPersonas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id(); // PK, "id" => autoincrement, bigInteger
            $table->string('nombre', 50);
            $table->string('apellido_paterno', 50);
            $table->string('apellido_materno', 50);
            $table->string('email', 50)->unique();
            $table->string('celular', 20)->nullable();
            $table->timestamps();
            // created_at => 'timestamp', guarda la fecha y hora de registro 
            // updated_at => 'timestamp', guarda la fecha y hora de la ultima actualización
            $table->softDeletes();
            // deleted_at => 'timestamp', guarda la fecha y hora en que se eliminó
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
