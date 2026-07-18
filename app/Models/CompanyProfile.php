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
    ];

    protected $casts = [
        'core_values' => 'array',
        'achievements' => 'array',
        'is_active' => 'boolean',
    ];
}
