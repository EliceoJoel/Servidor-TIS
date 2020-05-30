<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PercentageKnowledgeDoc extends Model
{
    protected $table = 'percentageKnowledgeDoc';
    protected $fillable = ['id_announcement','oral','written'];
   
}
