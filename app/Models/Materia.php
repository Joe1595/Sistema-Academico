<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Materia extends Model
{
    use HasFactory;
    //N:1
    public function curso()
    {
        return $this -> belongsTo(Curso::class);
    }
    //N:M
    public function aulas()
    {
        return $this -> BelongsToMany(Aula::class);
    }
    //N:M   una materia se le asigna a muchas materias
    public function personas()
    {
        return $this->belongsToMany(Persona::class);
    }
}
