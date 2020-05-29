<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeritosRegister extends Model
{
    protected $table = 'meritosRegister';
    protected $fillable = ['id_postulant','id_merito','nota_merito'];
}
