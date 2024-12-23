<?php

namespace App\MoonShine\Resources;

use App\Models\DoorDimension;
use MoonShine\Fields\Text;
use MoonShine\Fields\Boolean;
use MoonShine\Resources\ModelResource;

class DoorDimensionResource extends ModelResource
{
    protected string $model = DoorDimension::class;
    protected string $title = 'Door Dimensions';
    public string $column ="opening_side";
   

    /**
     * Define the fields for the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
          
            Text::make('Opening Side')->sortable(),
            Text::make('Has Top Section'),
            Text::make('Service Free'),
            Text::make('Door Frame'),
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
