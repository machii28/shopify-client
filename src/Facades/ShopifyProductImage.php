<?php

namespace Markc\ShopifyClient\Facades;

use Markc\ShopifyClient\Shopify\Product\Image;

class ShopifyProductImage
{
    /**
     * @return \Markc\ShopifyClient\Shopify\Product\Image
     */
    public static function resolveFacades(): Image
    {
        return (new Image());
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