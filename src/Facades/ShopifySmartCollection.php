<?php

namespace Markc\ShopifyClient\Facades;

use Markc\ShopifyClient\Shopify\Collection\Smart;

class ShopifySmartCollection
{
    /**
     * @return \Markc\ShopifyClient\Shopify\Collection\Smart
     */
    public static function resolveFacades(): Smart
    {
        return (new Smart());
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