<?php

namespace Markc\ShopifyClient\Facades;

use Markc\ShopifyClient\Shopify\Product\Variant;

class ShopifyProductVariant
{
    /**
     * @return \Markc\ShopifyClient\Shopify\Product\Variant
     */
    public static function resolveFacades(): Variant
    {
        return (new Variant());
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