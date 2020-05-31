<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    protected $table = 'notas';
    protected $fillable = ['id_postulant', 'nota_merito', 'nota_conocimiento', 'nota_final'];
}
