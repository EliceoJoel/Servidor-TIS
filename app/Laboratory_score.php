<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratory_score extends Model
{
    protected $table = 'laboratory_socres';
    protected $fillable = ['idPostulant','idtTheme','score'];
}
