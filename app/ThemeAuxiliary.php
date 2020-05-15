<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThemeAuxiliary extends Model
{
    protected $table = 'themeAuxiliary';
    protected $fillable = ['id_announcement','name'];
}
