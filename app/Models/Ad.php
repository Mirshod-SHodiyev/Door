<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;




class Ad extends Model
{
    use HasFactory;
    protected $with = ["images"];
    protected $fillable = ['title',
        'description',
         'users_id',
         'colors_id',
        'door_dimensions_id',


        ];
public function colors(): \Illuminate\Database\Eloquent\Relations\BelongsTo
{
return $this->belongsTo(Color::class,"colors_id");
}

public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
{
  return $this->belongsTo(User::class,"users_id")  ;
}
    public function bookmarkedByUsers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'bookmarks', 'ad_id', 'user_id');
    }
    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {

        return $this->hasMany(Images::class, 'ad_id','id');
    }
    public function owner()
    {
        return $this->belongsTo(User::class, 'users_id');
    }




}
