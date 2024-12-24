<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Ad;
use App\MoonShine\Resources\AdResource;



use App\MoonShine\Resources\ColorResource;
use App\MoonShine\Resources\DoorDimensionResource;
use App\MoonShine\Resources\DoorTypeResource;
use App\MoonShine\Resources\ImagesResource;
use App\MoonShine\Resources\UserResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Pages\Page;
use Closure;
use App\MoonShine\Resources\BookmarkResource;
class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.admins_title'),
                    new MoonShineUserResource()
                ),
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.role_title'),
                    new MoonShineUserRoleResource()
                ),
            ]),
            MenuItem::make("Bosh sahifa", url("/"))->icon("heroicons.home")->customLinkAttributes(['target'=>'_blank']),
            MenuItem::make("E'lonlar", new AdResource())->icon("heroicons.home-modern"),
            MenuItem::make("user",new UserResource())->icon("heroicons.user-circle"),
            MenuItem::make("Colors", new ColorResource())->icon("heroicons.swatch"), 
            MenuItem::make("Door Dimension", new DoorDimensionResource())->icon("heroicons.ellipsis-vertical"),
            MenuItem::make("Door Type", new DoorTypeResource())->icon("heroicons.ellipsis-vertical"),
            MenuItem::make("images",new ImagesResource())->icon("heroicons.photo"),

        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
