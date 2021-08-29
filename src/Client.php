<?php

namespace Markc\ShopifyClient;

use Osiset\BasicShopifyAPI\BasicShopifyAPI;
use Osiset\BasicShopifyAPI\Options;
use Osiset\BasicShopifyAPI\Session;

class Client
{
    /**
     * @var string
     */
    protected string $shop = '';

    /**
     * @var \Osiset\BasicShopifyAPI\BasicShopifyAPI
     */
    protected BasicShopifyAPI $api;

    /**
     * Client constructor.
     *
     * @throws \Exception
     */
    public function __construct()
    {
        $options = new Options();
        $options->setVersion(config('shopify.version'));

        $this->api = new BasicShopifyAPI($options);
        $this->api->setSession(new Session(
            config('shopify.shop'),
            config('shopify.api_secret')
        ));
    }

    /**
     * @return \Osiset\BasicShopifyAPI\BasicShopifyAPI
     */
    public function api(): BasicShopifyAPI
    {
        return $this->api;
    }
}