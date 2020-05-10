<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    protected $fillable = ['idRol', 'names', 'surnames', 'user', 'password', 'announcement', 'logged'];
}
