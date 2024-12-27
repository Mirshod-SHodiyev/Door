<?php

namespace App\MoonShine\Resources;

use App\Models\DoorType;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;

class DoorTypeResource extends ModelResource
{
    protected string $model = DoorType::class;
    protected string $title = 'Door Types';
    public string $column ="name";
 

    /**
     * Define the fields for the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Text::make('Ranglar', 'name')->sortable(),
            Text::make('Rasm', 'image_url')->hideOnIndex(),
            
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
            'image_url' => 'required|string|max:255',
        ];
    }
}
