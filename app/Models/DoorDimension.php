<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoorDimension extends Model
{
    use HasFactory;
    protected $table = 'door_dimensions';

    protected $fillable = [
        'width',
        'height',
        'opening_side',
        'has_top_section',
        'service_free',
        'door_frame',
    ];
}
