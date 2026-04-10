<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchNumber extends Model
{
    protected $table = 'research_numbers';
    protected $fillable = [
        'published_papers',
        'research_partners',
        'field_studies',
        'open_access_downloads',
    ];
}
