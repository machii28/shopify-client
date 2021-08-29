<?php

namespace Markc\ShopifyClient\Facades;

use Markc\ShopifyClient\Shopify\Collection;

class ShopifyCollection
{
    /**
     * @return \Markc\ShopifyClient\Shopify\Collection
     */
    public static function resolveFacades(): Collection
    {
        return (new Collection());
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