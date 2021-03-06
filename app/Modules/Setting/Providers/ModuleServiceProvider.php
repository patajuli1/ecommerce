<?php

namespace App\Modules\Setting\Providers;

use App\Modules\Setting\Repositories\SettingInterface;
use App\Modules\Setting\Repositories\SettingRepository;
use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/Lang', 'setting');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'setting');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations', 'setting');
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->settingRegister();

    }

    public function settingRegister()
    {

        $this->app->bind(SettingInterface::class, SettingRepository::class);

    }
}
