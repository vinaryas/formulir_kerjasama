<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
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
			$event->menu->add('MAIN NAVIGATION');
            $event->menu->add([
                'text' => 'Dashboard',
                'url' => route('home'),
                'icon' => 'fas fa-tachometer-alt',
                'permission' => 'dashboard'
            ]);

			$event->menu->add([
                'text' => 'Manajemen Otorisasi',
                'icon' => 'fas fa-user-shield',
                'permission' => 'list-role|list-user',
                'submenu' => [
                    [
                        'text' => 'User',
                        'url' => route('user.index'),
                        'icon' => 'fas fa-bullseye',
                        'active' => [route('user.index').'/*',route('user.index')],
                        'permission' => 'list-user',
                    ],
                    [
                        'text' => 'Role',
                        'url' => route('role.index'),
                        'icon' => 'fas fa-bullseye',
                        'active' => [route('role.index').'/*',route('role.index')],
                        'permission' => 'list-role',
                    ],
                ],
            ]);

		});
    }
}
