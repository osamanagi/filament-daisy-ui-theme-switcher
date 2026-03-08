<?php

namespace Osamanagi\FilamentDaisyUiThemeSwitcher;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Assets\Theme;
use Filament\Support\Color;
use Filament\Support\Facades\FilamentAsset;

class FilamentDaisyUiThemeSwitcher implements Plugin
{
    public function getId(): string
    {
        return 'filament-daisy-ui-theme-switcher';
    }

    public function register(Panel $panel): void
    {
        FilamentAsset::register([
            Theme::make('filament-daisy-ui-theme-switcher', __DIR__ . '/../resources/dist/filament-daisy-ui-theme-switcher.css'),
        ]);

        $panel
            ->font('DM Sans')
            ->primaryColor(Color::Amber)
            ->secondaryColor(Color::Gray)
            ->warningColor(Color::Amber)
            ->dangerColor(Color::Rose)
            ->successColor(Color::Green)
            ->grayColor(Color::Gray)
            ->theme('filament-daisy-ui-theme-switcher');
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
