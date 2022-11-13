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

			$event->menu->add([
                'text' => 'Master',
                'icon' => 'fas fa-user-shield',
				'permission' => 'jenis-kerjasama|jenis-pengajuan',
                'submenu' => [
                    [
                        'text' => 'Jenis Kerjasama',
                        'url' => route('jenisKerjasama.index'),
                        'icon' => 'far fa-circle',
                        'active' => ['jenisKerjasama.index'],
						'permission' => 'jenis-kerjasama',
                    ],
                    [
                        'text' => 'Jenis Pengajuan',
                        'url' => route('jenisPengajuan.index'),
                        'icon' => 'far fa-circle',
                        'active' => ['jenisPengajuan.index'],
						'permission' => 'jenis-pengajuan'
                    ],
                    [
                        'text' => 'Kategori Mitra',
                        'url' => route('kategoriMitra.index'),
                        'icon' => 'far fa-circle',
                        'active' => ['kategoriMitra.index'],
						'permission' => 'kategori-mitra',
                    ],
                    [
                        'text' => 'Rencana Formalisasi',
                        'url' => route('rencanaFormalisasi.index'),
                        'icon' => 'far fa-circle',
                        'active' => ['rencanaFormalisasi.index'],
						'permission' => 'rencana-formalisasi',
                    ],
                    [
                        'text' => 'Lingkup Kerjasama',
                        'url' => route('lingkup.index'),
                        'icon' => 'far fa-circle',
                        'active' => ['lingkup.index'],
						'permission' => 'lingkup-kerjasama',
                    ],
                ],
            ]);

			$event->menu->add([
                'text' => 'Pengajuan',
                'url' => route('form.index'),
                'icon' => 'fas fa-file-alt',
                'active' => ['form*'],
				'permission' => 'pengajuan',
            ]);

            $event->menu->add([
                'text' => 'Disposisi',
                'url' => route('disposition.index'),
                'icon' => 'fas fa-file-alt',
                'active' => ['disposition*'],
				'permission' => 'disposition',
            ]);

            // $event->menu->add([
            //     'text' => 'Surat Disposisi',
            //     'url' => route('disposition.index'),
            //     'icon' => 'fas fa-file-alt',
            //     'active' => ['disposition*'],
			// 	'permission' => 'disposition',
            // ]);

			$event->menu->add([
                'text' => 'Approval',
                'url' => route('approval.index'),
                'icon' => 'fas fa-file-signature',
                'active' => ['approval*'],
				'permission' => 'persetujuan',
            ]);

            $event->menu->add([
                'text' => 'Review',
                'url' => route('review.index'),
                'icon' => 'fas fa-file-signature',
                'active' => ['review*'],
				'permission' => 'review',
            ]);

        });
    }
}
