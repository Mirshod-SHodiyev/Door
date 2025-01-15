<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ad;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Text;




/**
 * @extends ModelResource<Ad>
 */
class AdResource extends ModelResource
{
    protected string $model = Ad::class;

    protected string $title = "E'lonlar";

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Mijoz Ismi', 'customers_info')->sortable(),
                Text::make("width")->hideOnIndex(),
                Text::make("height")->hideOnIndex(),
                Text::make("discount")->hideOnIndex(),
                Text::make("thickness")->hideOnIndex(),
                Text::make("phone_number")->hideOnIndex(),
                BelongsTo::make(label: 'Ranglar',  relationName: 'Color', resource: new ColorResource()), 
                BelongsTo::make( label: ' Narxlari', relationName: 'Price', resource: new PriceResource()),
                BelongsTo::make( label: 'Eshik Malumotlari', relationName: 'DoorDimension', resource: new DoorDimensionResource()), 
                BelongsTo::make( label: 'Eshik Turlari', relationName: 'DoorType', resource: new DoorTypeResource()),
                BelongsTo::make(label:  'Sotuvchilar', relationName: 'user', resource: new UserResource()),
                BelongsTo::make( label: 'Zamoklar', relationName: 'Knob', resource: new KnobResource()),
                BelongsTo::make( label: 'Eshik Qo\'shimchalar', relationName: 'DoorExtra', resource: new DoorExtraResource()),
                BelongsTo::make( label: 'Eshiklar', relationName: 'Frame', resource: new FrameResource()),
                
               


            ]),
        ];
    }

    /**
     * @param Ad $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
