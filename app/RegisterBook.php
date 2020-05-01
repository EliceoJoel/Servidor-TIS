<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisterBook extends Model
{
    protected $table = 'register_book';
    protected $fillable = ['names', 'first_surname', 'second_surname', 'direction', 'email', 'phone', 'ci', 'sis_code', 'announcement', 'auxiliary', 'docNumber', 'date'];
}
