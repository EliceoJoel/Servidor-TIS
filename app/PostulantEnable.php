<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostulantEnable extends Model
{
    protected $table = 'postulantEnable';
    protected $fillable = ['id_book','name', 'auxiliary', 'announcement', 'enable', 'reason'];
}
