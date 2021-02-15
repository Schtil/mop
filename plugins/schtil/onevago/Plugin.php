<?php namespace Schtil\Onevago;

use Backend;
use October\Rain\Support\Facades\Flash;
use System\Classes\PluginBase;

/**
 * Onevago Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'schtil.onevago::lang.plugin.name',
            'description' => 'schtil.onevago::lang.plugin.description',
            'author'      => 'schtil.onevago::lang.plugin.author',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Schtil\Onevago\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'schtil.onevago.some_permission' => [
                'tab' => 'Onevago',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'onevago' => [
                'label'       => 'schtil.onevago::lang.plugin.name',
                'url'         => Backend::url('schtil/onevago/tours'),
                'icon'        => 'icon-leaf',
                'permissions' => ['schtil.onevago.*'],
                'order'       => 500,

                'sideMenu' => [
                    'tours' => [
                        'label'       => 'schtil.onevago::lang.menu.tours',
                        'icon'        => 'icon-hdd-o',
                        'url'         => Backend::url('schtil/onevago/tours'),
                        'permissions' => ['schtil.onevago.*'],
                        'order'       => 500,
                    ],
                ],
            ],
        ];
    }

    public function onSettingsHandler()
    {
        Flash::error("DO NOT CLICK THIS BUTTON!");
        return "you clicked it";
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'Settings',
                'description' => 'Settings plugin.',
                'category'    => 'Onevago',
                'icon'        => 'icon-cog',
                'class'       => 'Schtil\Onevago\Models\Settings',
                'order'       => 500,
                'keywords'    => 'security onevago',
                'permissions' => ['schtil.onevago.access_settings']
            ]
        ];
    }
}
