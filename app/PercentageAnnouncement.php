<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PercentageAnnouncement extends Model
{
    protected $table = 'percentageAnnouncement';
    protected $fillable = ['id_announcement','type','percentage'];
}
