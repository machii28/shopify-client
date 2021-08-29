<?php

namespace Markc\ShopifyClient\Facades;

use Markc\ShopifyClient\Shopify\Customer;

class ShopifyCustomer
{
    /**
     * @return \Markc\ShopifyClient\Shopify\Customer
     */
    public static function resolveFacades(): Customer
    {
        return (new Customer());
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