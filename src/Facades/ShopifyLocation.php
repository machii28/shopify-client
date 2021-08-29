<?php

namespace Markc\ShopifyClient\Facades;

use Markc\ShopifyClient\Shopify\Inventory\Location;

class ShopifyLocation
{
    /**
     * @return \Markc\ShopifyClient\Shopify\Inventory\Location
     */
    public static function resolveFacades(): Location
    {
        return (new Location());
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