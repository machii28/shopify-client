<?php

namespace Markc\ShopifyClient\Facades;

use Markc\ShopifyClient\Shopify\Collection\Custom;

class ShopifyCustomCollection
{
    /**
     * @return \Markc\ShopifyClient\Shopify\Collection\Custom
     */
    public static function resolveFacades(): Custom
    {
        return (new Custom());
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