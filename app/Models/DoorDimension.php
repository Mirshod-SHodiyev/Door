<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoorDimension extends Model
{
    use HasFactory;
    protected $table = 'door_dimensions';

    protected $fillable = [
       
        'opening_side',
        'has_top_section',
        'door_frame',
        'thickness',
        'material'
    ];
}
