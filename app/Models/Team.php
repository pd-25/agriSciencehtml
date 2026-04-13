<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';
    protected $fillable = [
        'image',
        'name',
        'designation',
        'description',
        'social_icon',
        'social_link',
    ];

    protected $casts = [
        'social_icon' => 'array',
        'social_link' => 'array',
    ];
}
