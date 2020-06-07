<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_announcement extends Model
{
    protected $table = 'user_announcement';
    protected $fillable = ['idAnnouncement','idUser','idAuxiliary','idTheme'];
}

