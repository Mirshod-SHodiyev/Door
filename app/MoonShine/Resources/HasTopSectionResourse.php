<?php

namespace App\MoonShine\Resources;

use App\Models\HasTopSection;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;

class HasTopSectionResourse extends ModelResource
{
    protected string $model = HasTopSection::class;
    protected string $title = 'Yuqori Qismi';
    public string $column ="name";
 

    /**
     * Define the fields for the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Text::make('HasTopSection', 'name')->sortable(),
            Text::make('Narx' , 'price')->sortable()
            
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
            
        ];
    }
}
