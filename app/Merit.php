<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merit extends Model
{
    protected $table = 'merit';
    protected $fillable = ['id_announcement','name_announcement','name', 'description', 'type' , 'number'];
}

