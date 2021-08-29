<?php

namespace Markc\ShopifyClient\Facades;

use Markc\ShopifyClient\Shopify\Inventory\InventoryLevel;

class ShopifyInventoryLevel
{
    /**
     * @return \Markc\ShopifyClient\Shopify\Inventory\InventoryLevel
     */
    public static function resolveFacades(): InventoryLevel
    {
        return (new InventoryLevel());
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