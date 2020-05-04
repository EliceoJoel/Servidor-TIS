<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class postulantScore extends Model
{
    protected $table = 'postulant_scores';
    protected $fillable = ['id_postulant','score', 'score_oral'];
}
