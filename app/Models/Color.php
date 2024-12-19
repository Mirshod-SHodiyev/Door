<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $table = 'colors';
    protected $fillable = [
        'name',
        'hex_value',
    ];

  
    public function ads(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Ad::class, 'color_id'); // 'color_id' - Ad modelidagi foreign key
    }


    public function getAdsCountAttribute()
    {
        return $this->ads()->count();
    }
}
