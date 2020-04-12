<?php

namespace Postulant;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = 'announcement';
    protected $fillable = ['name', 'year', 'departament', 'type', 'auxiliary'];
    protected $casts = [
        'auxiliary' => 'array'
    ];
}
