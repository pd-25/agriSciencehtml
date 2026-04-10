<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $table = 'publications';
    protected $fillable = [
        'category',
        'type_label',
        'title',
        'description',
        'author',
        'date',
        'source_info',
        'source_icon',
    ];
}
