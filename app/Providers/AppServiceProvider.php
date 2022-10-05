<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Http\Request;
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
                'text' => __('submission.menu.rbac.index'),
                'icon' => 'fas fa-user-shield',
                'permission' => 'list-role|list-user',
                'submenu' => [
                    [
                        'text' => __('submission.menu.rbac.user'),
                        'url' => route('user.index'),
                        'icon' => 'fas fa-bullseye',
                        'active' => [route('user.index').'/*',route('user.index')],
                        'permission' => 'list-user',
                    ],
                    [
                        'text' => __('submission.menu.rbac.role'),
                        'url' => route('role.index'),
                        'icon' => 'fas fa-bullseye',
                        'active' => [route('role.index').'/*',route('role.index')],
                        'permission' => 'list-role',
                    ],
                ],
            ]);

			$event->menu->add([
                'text' => __('submission.menu.master.index'),
                'icon' => 'fas fa-user-shield',
				'permission' => 'jenis-kerjasama|jenis-pengajuan',
                'submenu' => [
                    [
                        'text' => __('submission.menu.master.cooperation_type'),
                        'url' => route('jenisKerjasama.index'),
                        'icon' => 'far fa-circle',
                        'active' => ['jenisKerjasama.index'],
						'permission' => 'jenis-kerjasama',
                    ],
                    [
                        'text' => __('submission.menu.master.submission_type'),
                        'url' => route('jenisPengajuan.index'),
                        'icon' => 'far fa-circle',
                        'active' => ['jenisPengajuan.index'],
						'permission' => 'jenis-pengajuan'
                    ],
                    [
                        'text' => __('submission.menu.master.partner_category'),
                        'url' => route('kategoriMitra.index'),
                        'icon' => 'far fa-circle',
                        'active' => ['kategoriMitra.index'],
						'permission' => 'kategori-mitra',
                    ],
                    [
                        'text' => __('submission.menu.master.formalization_plan'),
                        'url' => route('rencanaFormalisasi.index'),
                        'icon' => 'far fa-circle',
                        'active' => ['rencanaFormalisasi.index'],
						'permission' => 'rencana-formalisasi',
                    ],
                ],
            ]);

			$event->menu->add([
                'text' => __('submission.menu.submission'),
                'url' => route('form.index'),
                'icon' => 'fas fa-file-alt',
                'active' => ['form*'],
				'permission' => 'pengajuan',
            ]);

			$event->menu->add([
                'text' => __('submission.menu.disposition'),
                'url' => route('disposisition.index'),
                'icon' => 'fas fa-file-signature',
                'active' => ['approval*'],
				'permission' => 'disposisi',
            ]);

			$event->menu->add([
                'text' => __('submission.menu.approval'),
                'url' => route('persetujuan.index'),
                'icon' => 'fas fa-file-signature',
                'active' => ['approval*'],
				'permission' => 'persetujuan',
            ]);

			$event->menu->add([
                'text' => __('submission.menu.review'),
                'url' => route('review.index'),
                'icon' => 'fas fa-file-signature',
                'active' => ['review*'],
				'permission' => 'review',
            ]);

        });
    }
}
