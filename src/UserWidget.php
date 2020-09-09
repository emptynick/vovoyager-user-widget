<?php

namespace Emptynick\UserWidget;

use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Voyager\Admin\Contracts\Plugins\Features\Provider\JS;
use Voyager\Admin\Contracts\Plugins\Features\Provider\PublicRoutes;
use Voyager\Admin\Contracts\Plugins\WidgetPlugin;
use Voyager\Admin\Facades\Voyager as VoyagerFacade;
use Voyager\Admin\Manager\Plugins as PluginManager;

class UserWidget implements WidgetPlugin, JS, PublicRoutes
{
    public $name = 'User Widget';
    public $description = 'A widget to display some stats about your users in Voyager II';
    public $repository = 'emptynick/voyager-user-widget';
    public $website = 'https://github.com/emptynick/voyager-user-widget';
    public $version = '1.0.0';

    public function providePublicRoutes(): void
    {
        Route::get('scripts.js', function () {
            $path = realpath(dirname(__DIR__, 1).'/resources/dist/scripts.js');
            $response = response(File::get($path), 200, ['Content-Type' => 'text/javascript']);
            $response->setSharedMaxAge(31536000);
            $response->setMaxAge(31536000);
            $response->setExpires(new \DateTime('+1 year'));

            return $response;
        })->name('user-widget');
    }

    public function provideJS(): string
    {
        return route('voyager.user-widget');
    }

    public function getWidgetComponent(): string
    {
        return 'user-widget';
    }

    public function getWidgetParameters(): array
    {
        $auth = VoyagerFacade::auth();
        $model_name = get_class($auth->user());
        $model = new $model_name();
        $count = $model->count();
        $timestamps = $model->timestamps ?? false;

        $thisMonth = 0;
        $thisYear = 0;
        if ($timestamps) {
            $thisMonth = $model->whereMonth('created_at', Carbon::now()->month)->count();
            $lastMonth = $model->whereMonth('created_at', Carbon::now()->subMonth()->month)->count();
            $thisYear = $model->whereYear('created_at', date('Y'))->count();
            $lastYear = $model->whereYear('created_at', (date('Y') - 1))->count();
        }

        return compact('count', 'timestamps', 'thisMonth', 'lastMonth', 'thisYear', 'lastYear');
    }

    public function getWidth(): int
    {
        return 6;
    }

    public function getTitle(): ?string
    {
        return 'Users';
    }

    public function getIcon(): ?string
    {
        return 'users';
    }
}
