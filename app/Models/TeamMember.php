<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'designation',
        'department',
        'short_bio',
        'biography',
        'photo',
        'email',
        'phone',
        'linkedin',
        'twitter',
        'facebook',
        'skills',
        'experience_years',
        'team_type',
        'order',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'skills' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($member) {
            if (empty($member->slug)) {
                $member->slug = Str::slug($member->name);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('team_type', $type);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
