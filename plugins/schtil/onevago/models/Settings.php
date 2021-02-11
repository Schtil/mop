<?php namespace Schtil\Onevago\Models;

use Illuminate\Support\Facades\Artisan;
use Model;

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
            exec("git pull");
            $settings["git_update"] = "0";
        }
        if($settings["update_migration"] == "1") {
            exec("php artisan october:up");
            $settings["update_migration"] = "0";
        };
        $this->attributes["value"] = json_encode($settings);
        Flash::error("TEST");
    }

}
