<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'email', 
        'phone', 
        'gender', 
        'graduation_year', 
        'major_id', 
        'working_in', 
        'status', 
        'user_id',
        'university',
        'fakultas',
    ];

    /**
     * Get the user associated with the Alumni
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the major associated with the Alumni
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
