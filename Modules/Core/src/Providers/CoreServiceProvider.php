<?php

namespace Duobix\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Nwidart\Modules\Traits\PathNamespace;

class CoreServiceProvider extends ServiceProvider
{
    use PathNamespace;

    protected string $name = 'Core';

    protected string $nameLower = 'core';

    /**
     * Boot the application events.
     */
    public function boot(): void
    {
        $this->registerCommands();
        $this->registerCommandSchedules();
        $this->registerTranslations();
        $this->registerConfig();
        $this->loadMigrationsFrom(module_path($this->name, 'src/database/migrations'));
        // $this->registerValidationRules();
    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        // $this->app->singleton('core', function () {
        //     return app()->make(Core::class);
        // });

        // $this->app->register(EventServiceProvider::class);
    }

    /**
     * Register commands in the format of Command::class
     */
    protected function registerCommands(): void
    {
        // $this->commands([]);
    }

    /**
     * Register command Schedules.
     */
    protected function registerCommandSchedules(): void
    {
        // $this->app->booted(function () {
        //     $schedule = $this->app->make(Schedule::class);
        //     $schedule->command('inspire')->hourly();
        // });
    }

    /**
     * Register translations.
     */
    public function registerTranslations(): void
    {
        $langPath = resource_path('lang/modules/'.$this->nameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->nameLower);
            $this->loadJsonTranslationsFrom($langPath);
        } else {
            $this->loadTranslationsFrom(module_path($this->name, 'src/lang'), $this->nameLower);
            $this->loadJsonTranslationsFrom(module_path($this->name, 'src/lang'));
        }
    }

    /**
     * Register config.
     */
    protected function registerConfig(): void
    {
        $this->publishes([module_path($this->name, 'src/config/config.php') => config_path($this->nameLower.'.php')], 'config');
        $this->mergeConfigFrom(module_path($this->name, 'src/config/config.php'), $this->nameLower);
    }

    // protected function registerValidationRules(): void
    // {
    //     Validator::extend('phone', PhoneNumber::class);

    //     Validator::extend('min_words', function ($attribute, $value, $parameters, $validator) {
    //         $min = $parameters[0] ?? 0; // Default to 0 if no parameter is provided
    //         return new WordCount($min, PHP_INT_MAX); // No upper limit

    //         return $wordCountRule->validate($attribute, $value, function ($message) use ($validator, $attribute) {
    //             $validator->errors()->add($attribute, $message);
    //         });
    //     });

    //     Validator::extend('max_words', function ($attribute, $value, $parameters, $validator) {
    //         $max = $parameters[0] ?? PHP_INT_MAX; // Default to no limit if no parameter is provided
    //         return new WordCount(0, $max); // No lower limit
            
    //         return $wordCountRule->validate($attribute, $value, function ($message) use ($validator, $attribute) {
    //             $validator->errors()->add($attribute, $message);
    //         });
    //     });
    // }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }
}
