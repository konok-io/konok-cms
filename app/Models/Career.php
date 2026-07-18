<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'location_id',
        'title',
        'slug',
        'short_description',
        'description',
        'requirements',
        'responsibilities',
        'benefits',
        'employment_type',
        'experience_level',
        'salary_range',
        'application_deadline',
        'is_featured',
        'is_active',
        'order',
    ];

    protected $casts = [
        'requirements' => 'array',
        'responsibilities' => 'array',
        'benefits' => 'array',
        'application_deadline' => 'date',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($career) {
            if (empty($career->slug)) {
                $career->slug = Str::slug($career->title);
            }
        });
    }

    public function department()
    {
        return $this->belongsTo(JobDepartment::class, 'department_id');
    }

    public function location()
    {
        return $this->belongsTo(JobLocation::class, 'location_id');
    }

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOpen($query)
    {
        return $query->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('application_deadline')
                  ->orWhere('application_deadline', '>=', now());
            });
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
