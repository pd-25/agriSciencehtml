<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatWeDo extends Model
{
    protected $table = "what_we_dos";
    protected $fillable = [
        'title',
        'slug',
        'description',
        'icon',
        'color',
    ];
}
