<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoorExtra extends Model
{
    protected $table = 'door_extras';

    protected $fillable = [
        'name',
    ];
}
