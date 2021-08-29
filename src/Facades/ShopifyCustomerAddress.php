<?php

namespace Markc\ShopifyClient\Facades;

use Markc\ShopifyClient\Shopify\Customer\Address;

class ShopifyCustomerAddress
{
    /**
     * @return \Markc\ShopifyClient\Shopify\Customer\Address
     */
    public static function resolveFacades(): Address
    {
        return (new Address());
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