<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Ad extends Model
{
    use HasFactory;

  
    protected $with = ['images', 'colors', 'user',  'doorDimensions', 'doorTypes'];

    protected $fillable = [
        'title',
        'description',
        'width',
        'height',
        'customers_info',
        'users_id',
        'colors_id',
        'door_dimensions_id',
        'door_types_id',
    ];

  
    public function colors(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Color::class, 'colors_id');
    }

     public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id');
    }

  
    public function bookmarkedByUsers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'bookmarks', 'ad_id', 'user_id');
    }


    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Images::class, 'ad_id', 'id');
    }

   
    public function owner()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function doorDimensions(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(DoorDimension::class, 'door_dimensions_id');
    }

  
    public function doorTypes(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(DoorType::class, 'door_types_id');
    }
    public function price (): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Price::class);
    }
}
