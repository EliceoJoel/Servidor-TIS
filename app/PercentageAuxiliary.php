<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PercentageAuxiliary extends Model
{
    protected $table = 'percentageAuxiliary';
    protected $fillable = ['id_auxiliary','id_theme', 'percentage'];
   
}
