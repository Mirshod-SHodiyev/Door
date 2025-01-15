<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Price;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;

/**
 * @extends ModelResource<Price>
 */
class PriceResource extends ModelResource
{
    protected string $model = Price::class;

    protected string $title = 'Narx';
    public string $column ="price";
    

    /**
     * Define the fields for the resource.
     *
     * @return list<Field|Block>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Price Amount', 'price')->sortable(), // Narxni ko'rsatish
                BelongsTo::make('Ad', resource: new AdResource()) // E'lon bilan bog'lanish
                    ->sortable()
                    ->nullable(),
            ]),
        ];
    }

    /**
     * Define validation rules for the resource.
     *
     * @param Price $item
     * @return array<string, string|string[]>
     */
    public function rules($item): array
    {
        return [
            'price' => 'required|numeric|min:0', // Narx majburiy va ijobiy bo'lishi kerak
            'ad_id' => 'required|exists:ads,id', // Tegishli e'lon mavjud bo'lishi kerak
        ];
    }
}
