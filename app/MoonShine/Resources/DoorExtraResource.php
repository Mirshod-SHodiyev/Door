<?php

namespace App\MoonShine\Resources;

use App\Models\DoorExtra;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;

class DoorExtraResource extends ModelResource
{
    protected string $model = DoorExtra::class;
    protected string $title = 'Eshik Malumotlari';
    public string $column ="name";


    /**
     * Define the fields for the resource
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Text::make('name')->sortable(),
            Text::make('narxlar', 'price')->sortable(),
          
        ];
    }

    /**
     * Define validation rules for the resource.
     *
     * @param Color $item
     * @return array
     */
    public function rules($item): array
    {
        return [
            'name' => 'required|string|max:255', 
            'price' => 'required|string|max:255',
           
        ];
    }
}
