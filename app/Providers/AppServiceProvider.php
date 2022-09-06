<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add([
                'text' => 'Dashboard',
                'url' => route('home'),
                'icon' => 'fas fa-home',
                'active' => ['home'],
            ]);

            $event->menu->add([
                'text' => 'Form',
                'icon' => 'fas fa-layer-group',
                'submenu' => [
                    [
                        'text' => 'Pembuatan ID',
                        'url' => route('form.index'),
                        'icon' => 'fas fa-file-alt',
                        'active' => ['form*'],
                    ],
                ],
            ]);

            $event->menu->add([
                'text' => 'Approval',
                'icon' => '	fas fa-file-signature',
                'submenu' => [
                    [
                        'text' => 'Dalam Negeri',
                        'url' => route('approval.index'),
                        'icon' => 'fas fa-file-signature',
                        'active' => ['approval'],
                    ],
                ],
            ]);
        });
    }
}
