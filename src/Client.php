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
    protected $shop = '';

    /**
     * @var \Osiset\BasicShopifyAPI\BasicShopifyAPI
     */
    protected $api;

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
            config('shopify.access_token')
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