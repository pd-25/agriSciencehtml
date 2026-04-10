<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImpactNumbers extends Model
{
    protected $table = "impact_numbers";
    protected $fillable = [
        'farmers_empowered',
        'research_projects',
        'countries_active',
        'partner_organizations',
    ];
}
