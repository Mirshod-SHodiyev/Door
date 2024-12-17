<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoorDimension extends Model
{
    use HasFactory;

    protected $fillable = [
        'width',
        'height',
        'material',
        'opening_side',
        'has_top_section',
        'service_fee',
    ];
}
