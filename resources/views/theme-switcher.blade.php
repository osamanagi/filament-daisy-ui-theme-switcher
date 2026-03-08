@php
    use Illuminate\Support\Str;
    $defaultTheme = $defaultTheme ?? 'light';
    $rememberTheme = $rememberTheme ?? true;
    $themes = $themes ?? [];
@endphp

<div x-data="{
    currentTheme: null,
    open: false,
    init() {
        let stored = null;
        try { stored = localStorage.getItem('daisyui-theme'); } catch (e) {}
        this.currentTheme = stored || @js($defaultTheme);
    },
    setTheme(theme) {
        this.currentTheme = theme;
        document.documentElement.setAttribute('data-theme', theme);
        @if ($rememberTheme) try { localStorage.setItem('daisyui-theme', theme); } catch (e) {} @endif
        this.open = false;
    },
}" x-on:keydown.escape.window="open = false" x-on:click.outside="open = false" class="daisy-theme-switcher">
    {{-- ── Trigger button ────────────────────────────────────── --}}
    <button type="button" x-on:click="open = !open" :aria-expanded="open" :aria-label="'Switch theme, current: ' + currentTheme" title="Switch theme"
        class="fi-icon-btn">
        {{-- Paint Palette icon --}}
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
            stroke-linejoin="round" class="fi-icon" aria-hidden="true">
            <circle cx="13.5" cy="6.5" r=".5" fill="currentColor" />
            <circle cx="17.5" cy="10.5" r=".5" fill="currentColor" />
            <circle cx="8.5" cy="7.5" r=".5" fill="currentColor" />
            <circle cx="6.5" cy="12.5" r=".5" fill="currentColor" />
            <path
                d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z" />
        </svg>
    </button>

    {{-- ── Theme picker panel ─────────────────────────────────── --}}
    <div x-show="open" x-transition x-cloak class="daisy-theme-picker-panel" role="listbox" aria-label="DaisyUI themes">
        <div class="daisy-theme-picker-grid">
            @foreach ($themes as $theme)
                <button type="button" role="option" :aria-selected="currentTheme === '{{ $theme }}'"
                    x-on:click="setTheme('{{ $theme }}')" :class="{ 'daisy-active': currentTheme === '{{ $theme }}' }"
                    data-theme="{{ $theme }}" title="{{ Str::title(str_replace(['-', '_'], ' ', $theme)) }}" class="daisy-theme-item">
                    {{-- Four colour swatches: primary / secondary / accent / neutral --}}
                    <span class="daisy-theme-swatches" aria-hidden="true">
                        <span class="daisy-theme-swatch" style="background-color: var(--color-primary);"></span>
                        <span class="daisy-theme-swatch" style="background-color: var(--color-secondary);"></span>
                        <span class="daisy-theme-swatch" style="background-color: var(--color-accent);"></span>
                        <span class="daisy-theme-swatch" style="background-color: var(--color-neutral);"></span>
                    </span>

                    <span class="daisy-theme-label">{{ $theme }}</span>
                </button>
            @endforeach
        </div>
    </div>
</div>
