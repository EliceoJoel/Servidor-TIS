<?php

namespace Postulant;

use Illuminate\Database\Eloquent\Model;

class Postulant extends Model
{
    protected $table = 'postulants';
    protected $fillable = ['names', 'first_surname', 'second_surname', 'direction', 'email', 'phone', 'ci', 'auxiliary'];

}
