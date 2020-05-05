<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostulantEnable extends Model
{
    protected $table = 'postulantEnable';
    protected $fillable = ['idRegisterBook','name', 'auxiliary', 'announcement', 'enable', 'reason'];
}
