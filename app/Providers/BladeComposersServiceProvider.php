<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeComposersServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Prevent implicit submission of the form
        // https://stackoverflow.com/a/51507806
        Blade::directive('preventSubmitDefault', function () {
            return '<button type="submit" disabled hidden aria-hidden="true"></button>';
        });

        Blade::directive('hiddenInputs', function ($action = null) {
            $content = '
                <input type="hidden" name="_token" value="' . csrf_token(). '">
                <button type="submit" disabled hidden aria-hidden="true"></button>
            ';
            if ($action) {
                $content .= '<input type="hidden" name="_method" value=' . $action . '>';
            }

            return $content;
        });

        Blade::directive('currency', function () {
            return getSettingFor('currency', '€');
        });
    }}
}
