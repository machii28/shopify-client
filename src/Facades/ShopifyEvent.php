<?php

namespace Markc\ShopifyClient\Facades;

use Markc\ShopifyClient\Shopify\Event;

class ShopifyEvent
{
    /**
     * @return \Markc\ShopifyClient\Shopify\Event
     */
    public static function resolveFacades(): Event
    {
        return (new Event());
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