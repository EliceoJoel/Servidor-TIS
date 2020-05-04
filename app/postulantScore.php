<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class postulantScore extends Model
{
    protected $table = 'postulantScore';
    protected $fillable = ['id_postulant','score', 'oral_socrep'];
}
