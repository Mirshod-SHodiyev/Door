<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Ad;

class ColorController extends Controller
{
   
    
    protected $fillable = ['name'];



    public function ads(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
    return $this->hasMany(Ad::class ,'colors_id');
    }
    public function getAdsCountAttribute()
    {
        return $this->ads()->count();
    }
    public function color(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

}
