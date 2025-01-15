<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\HasTopSection;
use App\Models\Knob;
use App\MoonShine\Resources\AdResource;
use App\MoonShine\Resources\ColorResource;
use App\MoonShine\Resources\DoorDimensionResource;
use App\MoonShine\Resources\DoorTypeResource;
use App\MoonShine\Resources\DoorExtraResource;
use App\MoonShine\Resources\KnobResource;
use App\MoonShine\Resources\FrameResource;
use App\MoonShine\Resources\HasTopSectionResourse;
use App\MoonShine\Resources\DoorFrameRecourse;


use App\MoonShine\Resources\UserResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Pages\Page;

use Closure;
use App\MoonShine\Resources\BookmarkResource;
use App\MoonShine\Resources\DoorFrameResourse;

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
            
           
            MenuItem::make("Bosh sahifa", url("/"))->icon("heroicons.home")->customLinkAttributes(['target'=>'_blank']),
            MenuItem::make("Eshiklar", new AdResource())->icon("heroicons.home-modern"),
            MenuItem::make("Sotuvchilar",new UserResource())->icon("heroicons.user-circle"),
            MenuItem::make("Ranglar", new ColorResource())->icon("heroicons.swatch"), 
            MenuItem::make("Eshik Malumotlari", new DoorDimensionResource())->icon("heroicons.ellipsis-vertical"),
            MenuItem::make("Eshik Turlari", new DoorTypeResource())->icon("heroicons.ellipsis-vertical"),
            MenuItem::make("Zamoklar", new KnobResource())->icon("heroicons.ellipsis-vertical"),
            MenuItem::make("Eshik Qo'shimchalar", new DoorExtraResource())->icon("heroicons.ellipsis-vertical"),
            MenuItem::make("Qoshi", new HasTopSectionResourse())->icon("heroicons.ellipsis-vertical"),
            MenuItem::make("Nalichka", new DoorFrameRecourse())->icon("heroicons.ellipsis-vertical"),

            
          

           

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
