<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class DoorType extends Model
{
    use HasFactory;
    protected $table = 'door_types';

    protected $fillable = ['name'];

    public function ads(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Ad::class, 'door_type_id'); 
    }

   
}
