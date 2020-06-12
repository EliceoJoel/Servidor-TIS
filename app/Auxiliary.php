<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auxiliary extends Model
{
    protected $table = 'auxiliary';
    protected $fillable = ['id_announcement','item','name'];
}
