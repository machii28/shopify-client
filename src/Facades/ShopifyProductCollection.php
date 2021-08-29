<?php

namespace Markc\ShopifyClient\Facades;

use Markc\ShopifyClient\Shopify\Collection\Product;

class ShopifyProductCollection
{
    /**
     * @return \Markc\ShopifyClient\Shopify\Collection\Product
     */
    public static function resolveFacades(): Product
    {
        return (new Product());
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