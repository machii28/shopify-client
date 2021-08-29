<?php

namespace Markc\ShopifyClient\Facades;

use Markc\ShopifyClient\Shopify\Webhook;

class ShopifyWebhook
{
    /**
     * @return \Markc\ShopifyClient\Shopify\Webhook
     */
    public static function resolveFacades(): Webhook
    {
        return (new Webhook());
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