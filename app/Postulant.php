<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulant extends Model
{
    protected $table = 'postulant';
    protected $fillable = ['names', 'first_surname', 'second_surname', 'direction', 'email', 'phone', 'ci', 'sis_code', 'announcement', 'auxiliary'];
    
}