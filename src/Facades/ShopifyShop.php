<?php

namespace Markc\ShopifyClient\Facades;

use Markc\ShopifyClient\Shopify\Shop;

class ShopifyShop
{
    /**
     * @return \Markc\ShopifyClient\Shopify\Shop
     */
    public static function resolveFacades(): Shop
    {
        return (new Shop());
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