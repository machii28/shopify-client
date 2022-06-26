<?php

namespace Markc\ShopifyClient;

use Osiset\BasicShopifyAPI\BasicShopifyAPI;
use Osiset\BasicShopifyAPI\Options;
use Osiset\BasicShopifyAPI\Session;

class Client
{
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
        $options->setApiKey(config('shopify.api_key'));
        $options->setApiSecret(config('shopify.api_secret'));

        $this->api = new BasicShopifyAPI($options);
        $this->api->setSession(new Session(
            config('shopify.shop')
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