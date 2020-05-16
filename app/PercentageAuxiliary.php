<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PercentageAuxiliary extends Model
{
    protected $table = 'percentageAuxiliary';
    protected $fillable = ['id_announcement','auxiliary','theme', 'percentage'];
   
}
