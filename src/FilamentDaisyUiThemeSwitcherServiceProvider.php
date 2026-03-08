<?php

namespace Osamanagi\FilamentDaisyUiThemeSwitcher;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentDaisyUiThemeSwitcherServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-daisy-ui-theme-switcher';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasConfigFile()
            ->hasViews();
    }
}
