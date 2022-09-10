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
                'text' => 'Pengajuan',
                'url' => route('form.index'),
                'icon' => 'fas fa-file-alt',
                'active' => ['form*'],
            ]);

			$event->menu->add([
                'text' => 'Persetujuan',
                'url' => route('approval.index'),
                'icon' => 'fas fa-file-signature',
                'active' => ['approval*'],
            ]);

            $event->menu->add([
                'text' => 'User',
                'url' => route('user.index'),
                'icon' => 'fas fa-bullseye',
                'active' => ['user.index'],
            ]);

            $event->menu->add([
                'text' => 'Master',
                'icon' => 'fas fa-user-shield',
                'submenu' => [
                    [
                        'text' => 'Jenis Kerjasama',
                        'url' => route('jenisKerjasama.index'),
                        'icon' => 'far fa-circle',
                        'active' => ['jenisKerjasama.index'],
                    ],
                    [
                        'text' => 'Jenis Pengajuan',
                        'url' => route('jenisPengajuan.index'),
                        'icon' => 'far fa-circle',
                        'active' => ['jenisPengajuan.index'],
                    ],
                    [
                        'text' => 'Kategori Mitra',
                        'url' => route('kategoriMitra.index'),
                        'icon' => 'far fa-circle',
                        'active' => ['kategoriMitra.index'],
                    ],
                    [
                        'text' => 'Rencana Formalisasi',
                        'url' => route('rencanaFormalisasi.index'),
                        'icon' => 'far fa-circle',
                        'active' => ['rencanaFormalisasi.index'],
                    ],
                ],
            ]);

        });
    }
}
