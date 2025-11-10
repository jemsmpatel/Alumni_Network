<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $table = 'alumni';
    protected $fillable = [
        'user_id',
        'graduation_year',
        'degree',
        'industry',
        'job',
        'skills',
        'location',
        'resume',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
