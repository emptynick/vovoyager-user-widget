<?php

namespace Emptynick\UserWidget;

use Illuminate\Support\ServiceProvider;
use Voyager\Admin\Manager\Plugins as PluginManager;

class UserWidgetServiceProvider extends ServiceProvider
{
    public function boot(PluginManager $pluginmanager)
    {
        $this->loadViewsFrom(realpath(__DIR__.'/../resources/views'), 'userwidget');
        $pluginmanager->addPlugin(\Emptynick\UserWidget\UserWidget::class);
    }

    public function register()
    {
        //
    }
}