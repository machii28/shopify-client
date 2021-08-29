<?php

namespace Markc\ShopifyClient\Facades;

use Markc\ShopifyClient\Shopify\Order;

class ShopifyOrder
{
    /**
     * @return \Markc\ShopifyClient\Shopify\Order
     */
    public static function resolveFacades(): Order
    {
        return (new Order());
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