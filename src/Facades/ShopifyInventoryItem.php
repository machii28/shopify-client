<?php

namespace Markc\ShopifyClient\Facades;

use Markc\ShopifyClient\Shopify\Inventory\InventoryItem;

class ShopifyInventoryItem
{
    /**
     * @return \Markc\ShopifyClient\Shopify\Inventory\InventoryItem
     */
    public static function resolveFacades(): InventoryItem
    {
        return (new InventoryItem());
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        return (self::resolveFacades())
            ->$name(...$arguments);
    }
}