<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoorAddition extends Model
{
    protected $table = 'door_additions';

    protected $fillable = [
        'name',
    ];
}
