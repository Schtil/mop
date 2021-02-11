<?php namespace Schtil\Onevago\Models;

use Illuminate\Support\Facades\Artisan;
use Model;
use October\Rain\Support\Facades\Flash;

/**
 * Settings Model
 */
class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'schtil_onevago_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';


    public function beforeSave()
    {
        $settings = json_decode($this->attributes["value"],1);
        if($settings["git_update"] == "1") {
            exec("cd /var/www/mop.schtil.com && git pull origin master");
            $settings["git_update"] = "0";
        }
        if($settings["update_migration"] == "1") {
            exec("cd /var/www/mop.schtil.com && php artisan october:up");
            $settings["update_migration"] = "0";
        };
        $this->attributes["value"] = json_encode($settings);
        Flash::error("TEST");
    }

}
