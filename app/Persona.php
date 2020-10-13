<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    use SoftDeletes;

    // PascalCase, snake_case
    // Persona => persona => personas
    // TipoCurso => tipo_curso => tipo_cursos
    // TipoCursoHorario => tipo_curso_horario
    // protected $table = 'persona';

    // NombreCompleto => nombre_completo
    // HolaComoEstan => hola_como_estan
    public function getNombreCompletoAttribute()
    {
        return strtoupper($this->apellido_paterno . ' ' . $this->apellido_materno . ' ' . $this->nombre);
    }
}
