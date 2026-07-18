<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JobLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'city',
        'country',
        'address',
        'is_remote',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_remote' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($location) {
            if (empty($location->slug)) {
                $location->slug = Str::slug($location->name);
            }
        });
    }

    public function careers()
    {
        return $this->hasMany(Career::class, 'location_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeRemote($query)
    {
        return $query->where('is_remote', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
