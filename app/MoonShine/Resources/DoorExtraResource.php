<?php

namespace App\MoonShine\Resources;

use App\Models\DoorExtra;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;

class DoorExtraResource extends ModelResource
{
    protected string $model = DoorExtra::class;
    protected string $title = 'Door Extra';
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
           
        ];
    }
}
