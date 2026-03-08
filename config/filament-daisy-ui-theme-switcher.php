<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default DaisyUI Theme
    |--------------------------------------------------------------------------
    | The theme applied when no saved preference exists in the user's browser.
    | Must be one of the themes listed below.
    */
    'default_theme' => env('DAISY_UI_DEFAULT_THEME', 'light'),

    /*
    |--------------------------------------------------------------------------
    | Available Themes
    |--------------------------------------------------------------------------
    | Limit which of DaisyUI's 35 built-in themes appear in the picker.
    | Remove any themes you do not want to offer to your users.
    */
    'themes' => [
        'light', 'dark', 'cupcake', 'bumblebee', 'emerald', 'corporate',
        'synthwave', 'retro', 'cyberpunk', 'valentine', 'halloween', 'garden',
        'forest', 'aqua', 'lofi', 'pastel', 'fantasy', 'wireframe', 'black',
        'luxury', 'dracula', 'cmyk', 'autumn', 'business', 'acid', 'lemonade',
        'night', 'coffee', 'winter', 'dim', 'nord', 'sunset', 'caramellatte',
        'abyss', 'silk',
    ],

    /*
    |--------------------------------------------------------------------------
    | Remember Theme
    |--------------------------------------------------------------------------
    | When true, the selected theme is persisted in the browser's localStorage
    | so it survives page reloads without a server round-trip.
    */
    'remember_theme' => true,

];
