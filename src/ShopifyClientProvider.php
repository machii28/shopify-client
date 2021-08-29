<?php

namespace Markc\ShopifyClient;

use Illuminate\Support\ServiceProvider;

class ShopifyClientProvider extends ServiceProvider
{
    /**
     * Boot initialization
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/shopify.php' => base_path() . '/config/'
        ], 'shopify-client-config');
    }

    /**
     * Register ShopifyClient services
     */
    public function register()
    {
        $this->app->singleton('shopify_client', function() {
            return(new Client());
        });

        $this->app->singleton('shopify', function() {
            return(new Shopify());
        });
    }
}