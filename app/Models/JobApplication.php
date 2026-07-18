<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'career_id',
        'full_name',
        'email',
        'phone',
        'resume',
        'linkedin_url',
        'portfolio_url',
        'cover_letter',
        'notes',
        'status',
    ];

    public function career()
    {
        return $this->belongsTo(Career::class);
    }

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'pending' => 'bg-warning',
            'reviewing' => 'bg-info',
            'interview' => 'bg-primary',
            'offer' => 'bg-success',
            'rejected' => 'bg-danger',
        ];
        return $badges[$this->status] ?? 'bg-secondary';
    }
}
