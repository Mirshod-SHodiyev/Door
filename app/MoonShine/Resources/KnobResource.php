<?php

namespace App\MoonShine\Resources;

use App\Models\Knob;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;

class KnobResource extends ModelResource
{
    protected string $model = Knob::class;
    protected string $title = 'Zamoki';
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
