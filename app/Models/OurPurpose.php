<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurPurpose extends Model
{
    protected $table = "our_purposes";
    protected $fillable = [
        'title',
        'slug',
        'description',
        'icon',
        'color',
    ];
}
