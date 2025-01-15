@props([
    'components' => [],
    'notifications' => false,
    'locales' => false,
])
<div {{ $attributes->merge(['class' => 'layout-navigation']) }}>
    @section("header-inner")

    @show

    <x-moonshine::components
        :components="$components"
    />

    {{ $slot ?? '' }}

   
    @if($locales)
        <x-moonshine::layout.locales />
    @endif
</div>
