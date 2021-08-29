<?php

namespace Markc\ShopifyClient\Shopify;

use Markc\ShopifyClient\Helpers\Traits\AllTrait;

abstract class BaseShopify
{
    use AllTrait;

    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';

    const ADMIN_URI = '/admin/';

    /**
     * Set if the call returns the full response
     *
     * @var bool
     */
    protected $getFullResponse = false;

    /**
     * Calls the Shopify Api
     *
     * @param string $method
     * @param string $path
     * @param array|null $parameters
     * @param array $headers
     * @return mixed
     */
    protected function send(string $method, string $path, array $parameters = null, array $headers = [])
    {
        $response = client()->api()->rest($method, $path, $parameters, $headers);

        if ($this->getFullResponse) {
            return $response;
        }

        if (isset($response['errors']) && $response['errors'] === true) {
            $this->getFullResponse = true;
            return $response;
        }

        return json_decode(json_encode($response['body']), true);
    }
}