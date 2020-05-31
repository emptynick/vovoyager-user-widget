<?php

namespace Emptynick\UserWidget;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Voyager\Admin\Classes\Formfield;
use Voyager\Admin\Contracts\Plugins\WidgetPlugin;

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
        return view('userwidget::widget');
    }

    public function getWidth(): int
    {
        return 3;
    }
}
