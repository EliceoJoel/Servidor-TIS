<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportantDate extends Model
{
    protected $table = 'importantDate';
    protected $fillable = ['date', 'event', 'description'];
   
}
