<?php

namespace Emptynick\UserWidget;

use Carbon\Carbon;
use Illuminate\View\View;
use Voyager\Admin\Contracts\Plugins\WidgetPlugin;
use Voyager\Admin\Facades\Voyager as VoyagerFacade;
use Voyager\Admin\Manager\Plugins as PluginManager;

class UserWidget implements WidgetPlugin
{
    public $name = 'User Widget';
    public $description = 'A widget to display some stats about your users in Voyager II';
    public $repository = 'emptynick/voyager-user-widget';
    public $website = 'https://github.com/emptynick/voyager-user-widget';
    public $version = '1.0.0';

    public function getInstructionsView(): ?View
    {
        return null;
    }

    public function registerProtectedRoutes()
    {
        //
    }

    public function registerPublicRoutes()
    {
        //
    }

    public function getSettingsView(): ?View
    {
        return null;
    }

    public function getCssRoutes(): array
    {
        return [];
    }

    public function getJsRoutes(): array
    {
        return [];
    }

    public function getWidgetView(): View
    {
        $auth = VoyagerFacade::auth();
        $model_name = get_class($auth->user());
        $model = new $model_name();
        $count = $model->count();
        $timestamps = $model->timestamps ?? false;

        $this_month = 0;
        $this_year = 0;
        if ($timestamps) {
            $this_month = $model->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->count();
            $this_year = $model->whereYear('created_at', date('Y'))->count();
        }

        return view('userwidget::widget', compact('count', 'timestamps', 'this_month', 'this_year'));
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
