<?php

namespace Markc\ShopifyClient\Facades;

use Markc\ShopifyClient\Shopify\PriceRule;

class ShopifyPriceRule
{
    /**
     * @return \Markc\ShopifyClient\Shopify\PriceRule
     */
    public static function resolveFacades(): PriceRule
    {
        return (new PriceRule());
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