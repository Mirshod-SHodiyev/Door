<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use MoonShine\Fields\Relationships\HasMany;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<User>
 */
class UserResource extends ModelResource
{
    protected string $model = User::class;

    protected string $title = 'Sotuvchilar';
    public string $column ="name";


    /**
     * @return list<Field>
     */
    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),

            Text::make("name")->sortable(),
              Text::make("email")->sortable(),
              HasMany::make('E\'lonlar', relationName: 'ads', resource: new AdResource())
              ->onlyLink() 
            

        ];
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function formFields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make("name")->sortable(),
             Text::make("email")->sortable(),
             HasMany::make('E\'lonlar', relationName: 'ads', resource: new AdResource())
                    ->onlyLink() 
            
        ];
    }

    /**
     * @return list<Field>
     */
    public function detailFields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('name')->sortable(),
            Text::make("email")->sortable(),
            HasMany::make('E\'lonlar', relationName: 'ads', resource: new AdResource())
            ->onlyLink() 
           
        ];
    }

    /**
     * @param User $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }

}
