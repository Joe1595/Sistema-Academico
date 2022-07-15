<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    //cursos
    //PARA RELACIONAR CON OTRA TABLA EN BASE DE DATOS DE UTILIZA LA FUNCION TINKER
    //EJERMPLO
    //wp_carrera
    //protected $table = "wp_curso";  
    public function materias()
    {
        // significa tiene muchas materias
        return $this->hasMany(Materia::class);
    }
}
