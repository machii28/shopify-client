<?php

namespace Markc\ShopifyClient\Facades;

use Markc\ShopifyClient\Shopify\PriceRule\DiscountCode;

class ShopifyPriceRuleDiscountCode
{
    /**
     * @return \Markc\ShopifyClient\Shopify\PriceRule\DiscountCode
     */
    public static function resolveFacades(): DiscountCode
    {
        return (new DiscountCode());
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