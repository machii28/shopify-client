<?php

if (!function_exists('client')) {

    /**
     * Returns the instance of client class
     *
     * @return \Laravel\Lumen\Application|mixed
     */
    function client() {
        return app('shopify_client');
    }

}

if (!function_exists('shopify')) {

    /**
     * Returns the instance of shopify class
     *
     * @return \Laravel\Lumen\Application|mixed
     */
    function shopify() {
        return app('shopify');
    }

}