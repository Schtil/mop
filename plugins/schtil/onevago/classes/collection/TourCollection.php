<?php namespace Schtil\Onevago\Classes\Collection;

use Lovata\Toolbox\Classes\Collection\ElementCollection;
use Schtil\Onevago\Classes\Item\TourItem;
use Schtil\Onevago\Classes\Store\TourListStore;

/**
 * Class TourCollection
 * @package Schtil\Onevago\Classes\Collection
 */
class TourCollection extends ElementCollection
{
    const ITEM_CLASS = TourItem::class;
}
