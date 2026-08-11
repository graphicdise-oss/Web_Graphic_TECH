<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'image',
        'rotation',
        'css_class',
    ];
}
