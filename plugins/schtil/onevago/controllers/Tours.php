<?php namespace Schtil\Onevago\Controllers;

use Backend\Facades\BackendMenu;
use Backend\Classes\Controller;

/**
 * Class Tours
 * @package Schtil\Onevago\Controllers
 */
class Tours extends Controller
{
    /** @var array */
    public $implement = [
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.FormController',
    ];
    /** @var string */
    public $listConfig = 'config_list.yaml';
    /** @var string */
    public $formConfig = 'config_form.yaml';

    /**
     * Tours constructor.
     */
    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Schtil.Onevago', 'onevago', 'tours');
    }
}
