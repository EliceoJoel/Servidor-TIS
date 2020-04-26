<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostulantEnable extends Model
{
    protected $table = 'postulantEnable';
    protected $fillable = ['sis_code', 'auxiliary', 'announcement', 'enable', 'reason'];
}
