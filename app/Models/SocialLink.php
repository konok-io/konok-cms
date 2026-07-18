<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'platform',
        'url',
        'icon',
        'color',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    public static function getPlatformIcon($platform)
    {
        $icons = [
            'facebook' => 'fab fa-facebook-f',
            'twitter' => 'fab fa-twitter',
            'linkedin' => 'fab fa-linkedin-in',
            'instagram' => 'fab fa-instagram',
            'youtube' => 'fab fa-youtube',
            'github' => 'fab fa-github',
            'tiktok' => 'fab fa-tiktok',
            'pinterest' => 'fab fa-pinterest-p',
            'whatsapp' => 'fab fa-whatsapp',
        ];
        return $icons[strtolower($platform)] ?? 'fab fa-link';
    }
}
