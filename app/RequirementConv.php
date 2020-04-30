<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequirementConv extends Model
{
    protected $table = 'requirementConv';
    protected $fillable = ['name_announcement', 'requirement'];
  
}
