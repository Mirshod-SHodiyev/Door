<?php

namespace App\MoonShine\Resources;

use App\Models\DoorFrame;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;

class DoorFrameRecourse extends ModelResource
{
    protected string $model = DoorFrame::class;
    protected string $title = 'Eshiklar Ma\'lumotlari';
    public string $column ="name";
 

    /**
     * Define the fields for the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Text::make('Nalijkalar', 'name')->sortable(),
            Text::make('narxlar', 'price')->sortable(),
            
        ];
    }

    /**
     * Define validation rules for the resource.
     *
     * @param DoorType $item
     * @return array
     */
    public function rules($item): array
    {
        return [
            'name' => 'required|string|max:255',
          
            'price'=>'required|number'
        ];
    }
}
