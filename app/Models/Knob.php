<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knob extends Model
{
    use HasFactory;

    protected $table = 'knobs';
    protected $fillable = ['name'];

}
