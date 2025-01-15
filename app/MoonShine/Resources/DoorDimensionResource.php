<?php

namespace App\MoonShine\Resources;

use App\Models\DoorDimension;
use MoonShine\Fields\Text;
use MoonShine\Fields\Boolean;
use MoonShine\Resources\ModelResource;

class DoorDimensionResource extends ModelResource
{
    protected string $model = DoorDimension::class;
    protected string $title = 'Eshik Qulayligi';
    public string $column ="opening_side";

   

    /**
     * Define the fields for the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
          
            Text::make('Eshik Qulayligi', 'opening_side')->sortable(),
            Text::make('Servis xizmati', 'service_free')->sortable(),
        
            
        ];
    }

    /**
     * Define validation rules for the resource.
     *
     * @param DoorDimension $item
     * @return array
     */
    public function rules($item): array
    {
        return [
           
            'opening_side' => 'required|string|max:255', 
            'has_top_section' => 'required|string|max:255', 
            'service_free' => 'required|string|max:255',
            'door_frame' => 'required|string|max:255',
        ];
    }
}
