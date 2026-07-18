<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'short_name',
        'tagline',
        'description',
        'chairman_name',
        'chairman_message',
        'chairman_image',
        'ceo_name',
        'ceo_message',
        'ceo_image',
        'vision',
        'mission',
        'core_values',
        'achievements',
        'founded_year',
        'employees_count',
        'logo',
        'dark_logo',
        'favicon',
        'is_active',
        // Home Page Fields
        'hero_title',
        'hero_description',
        'hero_image',
        'hero_button_text',
        'hero_button_url',
        'stat_projects',
        'stat_clients',
        'stat_team',
        'stat_years',
        'about_image',
        'home_features',
    ];

    protected $casts = [
        'core_values' => 'array',
        'achievements' => 'array',
        'home_features' => 'array',
        'is_active' => 'boolean',
    ];
}
