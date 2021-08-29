<?php

namespace Markc\ShopifyClient\Facades;

use Markc\ShopifyClient\Shopify\Metafield;

class ShopifyMetafield
{
    /**
     * @return \Markc\ShopifyClient\Shopify\Metafield
     */
    public static function resolveFacades(): Metafield
    {
        return (new Metafield());
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