<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfigAnnouncement extends Model
{
    protected $table = 'percentageKnowledgeDoc';
    protected $fillable = ['id_announcement','type','configuration'];
}
