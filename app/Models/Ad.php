<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Ad extends Model
{
    use HasFactory;

  
    protected $with = [ 'color', 'user',  'doorDimension', 'doorType', 'price' , 'knob' , 'hasTopSection' , 'doorExtra' , 'doorFrame' , 'frame' ];

    protected $fillable = [
        'phone_number',
        'customers_info',
        'extra_info',
        'width',
        'height',
        'discount',
        'thickness',
        'user_id',
        'colors_id',
        'door_types_id',
        'door_dimensions_id',
        'door_extras_id',
        'knobs_id',
        'door_frames_id',
        'has_top_sections_id',
        'frames_id',
        'materials_id',
    ];
    

  
    public function color()
    {
        return $this->belongsTo(Color::class, 'colors_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


  

   
    public function owner()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function doorDimension()
    {
        return $this->belongsTo(DoorDimension::class, 'door_dimensions_id');
    }

  
    public function doorType()
    {
        return $this->belongsTo(DoorType::class, 'door_types_id');
    }
    public function price ()
    {
        return $this->hasOne(Price::class);
    }

        
        public function knob()
        {
            return $this->belongsTo(Knob::class, 'knobs_id');
        }
        
        
    public function hasTopSection()
    {
        return $this->belongsTo(HasTopSection::class, 'has_top_sections_id');
    }

    public function doorExtra()
    {
        return $this->belongsTo(DoorExtra::class, 'door_extras_id');
    }
    public function doorFrame()
    {
        return $this->belongsTo(DoorFrame::class, 'door_frames_id');
    }
    public function frame()
    {
        return $this->belongsTo(Frame::class, 'frames_id');
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'materials_id');
    }
    
}
