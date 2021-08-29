<?php

namespace Markc\ShopifyClient\Facades;

use Markc\ShopifyClient\Shopify\PriceRule\Batch;

class ShopifyPriceRuleBatch
{
    /**
     * @return \Markc\ShopifyClient\Shopify\PriceRule\Batch
     */
    public static function resolveFacades(): Batch
    {
        return (new Batch());
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