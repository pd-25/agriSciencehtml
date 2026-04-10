<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'abouts';
    
    protected $fillable = [
        'image',
        'label',
        'title',
        'description',
        'list_items',
        'experience_years',
        'experience_text',
        'footer_text',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'youtube',
        'phone',
        'email',
        'address',
        'regional_offices',
    ];

    protected $casts = [
        'list_items' => 'array',
        'phone' => 'array',
        'email' => 'array',
        'regional_offices' => 'array',
    ];
}
