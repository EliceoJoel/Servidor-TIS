<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = 'announcement';
    protected $fillable = ['name', 'year', 'type', 'departament',  'file'];
    // protected $casts = [
    //     'auxiliary' => 'array'
    // ];
}