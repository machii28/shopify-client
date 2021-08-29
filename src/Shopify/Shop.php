<?php

namespace Markc\ShopifyClient\Shopify;

class Shop extends BaseShopify
{
    const SHOP_URI = '/shop.json';

    /**
     * Get the shop information
     *
     * @return mixed
     */
    public function get()
    {
        $path = BaseShopify::ADMIN_URI . Shop::SHOP_URI;
        $response = $this->send(BaseShopify::METHOD_GET, $path);

        return $this->getFullResponse ? $response : $response['shop'];
    }
}