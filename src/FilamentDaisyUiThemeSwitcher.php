<?php

namespace Osamanagi\FilamentDaisyUiThemeSwitcher;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Contracts\View\View;

class FilamentDaisyUiThemeSwitcher implements Plugin
{
    protected string $defaultTheme = 'light';

    protected array $themes = [
        'light', 'dark', 'cupcake', 'bumblebee', 'emerald', 'corporate',
        'synthwave', 'retro', 'cyberpunk', 'valentine', 'halloween', 'garden',
        'forest', 'aqua', 'lofi', 'pastel', 'fantasy', 'wireframe', 'black',
        'luxury', 'dracula', 'cmyk', 'autumn', 'business', 'acid', 'lemonade',
        'night', 'coffee', 'winter', 'dim', 'nord', 'sunset', 'caramellatte',
        'abyss', 'silk',
    ];

    protected string $position = PanelsRenderHook::TOPBAR_END;

    protected bool $rememberTheme = true;

    public static function make(): static
    {
        return app(static::class);
    }

    public function getId(): string
    {
        return 'filament-daisy-ui-theme-switcher';
    }

    public function register(Panel $panel): void
    {
        FilamentAsset::register(
            [
                Css::make(
                    'filament-daisy-ui-theme-switcher',
                    __DIR__ . '/../resources/dist/filament-daisy-ui-theme-switcher.css',
                ),
            ],
            package: 'osamanagi/filament-daisy-ui-theme-switcher',
        );
    }

    public function boot(Panel $panel): void
    {
        $defaultTheme = json_encode($this->defaultTheme);

        FilamentView::registerRenderHook(
            PanelsRenderHook::HEAD_START,
            fn (): string => "<script>(function(){var t=null;try{t=localStorage.getItem('daisyui-theme');}catch(e){}document.documentElement.setAttribute('data-theme',t||{$defaultTheme});})()</script>",
        );

        FilamentView::registerRenderHook(
            $this->position,
            fn (): View => view('filament-daisy-ui-theme-switcher::theme-switcher', [
                'themes' => $this->themes,
                'defaultTheme' => $this->defaultTheme,
                'rememberTheme' => $this->rememberTheme,
            ]),
        );
    }

    public function themes(array $themes): static
    {
        $this->themes = $themes;

        return $this;
    }

    public function getThemes(): array
    {
        return $this->themes;
    }

    public function defaultTheme(string $theme): static
    {
        $this->defaultTheme = $theme;

        return $this;
    }

    public function getDefaultTheme(): string
    {
        return $this->defaultTheme;
    }

    public function position(string $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function rememberTheme(bool $remember = true): static
    {
        $this->rememberTheme = $remember;

        return $this;
    }
}
