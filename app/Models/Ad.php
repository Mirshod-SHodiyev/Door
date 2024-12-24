<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Ad extends Model
{
    use HasFactory;

  
    protected $with = ['images', 'color', 'user',  'doorDimension', 'doorType'];

    protected $fillable = [
        'phone_number',
        'extra_info',
        'width',
        'height',
        'customers_info',
        'user_id',
        'colors_id',
        'door_dimensions_id',
        'door_types_id',
    ];

  
    public function color(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Color::class, 'colors_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Images::class, 'ad_id', 'id');
    }

   
    public function owner()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function doorDimension(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(DoorDimension::class, 'door_dimensions_id');
    }

  
    public function doorType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(DoorType::class, 'door_types_id');
    }
    public function price (): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Price::class);
    }



    
}
