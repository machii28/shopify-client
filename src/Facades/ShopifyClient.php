<?php

namespace Markc\ShopifyClient\Facades;

use Markc\ShopifyClient\Shopify\Collect;

class ShopifyClient
{
    /**
     * @return \Markc\ShopifyClient\Shopify\Collect
     */
    public static function resolveFacades(): Collect
    {
        return (new Collect());
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