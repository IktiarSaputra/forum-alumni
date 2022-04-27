<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get the alumni that owns the Major
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function alumni()
    {
        return $this->hasOne(Alumni::class);
    }
}
