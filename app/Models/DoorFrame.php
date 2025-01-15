<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoorFrame extends Model
{
    protected $table = 'door_frames';

    protected $fillable = [
        'name',
    ];
}
