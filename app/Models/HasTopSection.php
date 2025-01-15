<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasTopSection extends Model
{
    protected $table = 'has_top_sections';

    protected $fillable = [
        'name',
    ];
}
