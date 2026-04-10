<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'image',
        'title',
        'slug',
        'category',
        'excerpt',
        'content',
        'author_name',
        'author_image',
        'date',
        'read_time',
        'is_featured',
    ];

    protected $casts = [
        'date' => 'date',
        'is_featured' => 'boolean',
    ];
}
