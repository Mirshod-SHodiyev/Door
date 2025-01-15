<?php

namespace App\MoonShine\Resources;

use App\Models\Frame;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;

class FrameResource extends ModelResource
{
    protected string $model = Frame::class;
    protected string $title = 'Frammoga';
    public string $column ="name";
 

    /**
     * Define the fields for the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Text::make('Framoga', 'name')->sortable(),
            
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
