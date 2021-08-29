<?php

namespace Markc\ShopifyClient\Shopify\Collection;

use Markc\ShopifyClient\Contracts\RestReferenceContract;
use Markc\ShopifyClient\Shopify\BaseShopify;

class Custom extends BaseShopify implements RestReferenceContract
{
    const CUSTOM_COLLECTIONS_URI = '/custom_collections.json';
    const CUSTOM_COLLECTIONS_COUNT_URI = '/custom_collections/count.json';
    const CUSTOM_COLLECTION_URI = '/custom_collections/%s.json';

    /**
     * Get a paginated list of custom collections
     *
     * @param array $filter
     * @return array
     */
    public function get(array $filter = []): array
    {
        $path = BaseShopify::ADMIN_URI . Custom::CUSTOM_COLLECTIONS_URI;
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['custom_collections'];
    }

    /**
     * Get the count of custom collections based on filter
     *
     * @param array $filter
     * @return int
     */
    public function count(array $filter = []): int
    {
        $path = BaseShopify::ADMIN_URI . Custom::CUSTOM_COLLECTIONS_COUNT_URI;
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['count'];
    }

    /**
     * Find a single custom collection
     *
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Custom::CUSTOM_COLLECTION_URI, $id);
        $response = $this->send(BaseShopify::METHOD_GET, $path);

        return $this->getFullResponse ? $response : $response['custom_collection'];
    }

    /**
     * Get all the custom collections based on filter
     *
     * @param array $filter
     * @return array
     */
    public function all(array $filter = []): array
    {
        $this->classCalled = get_class();
        $this->dataIndex = 'custom_collections';
        $this->method = 'get';
        $this->arguments = [
            $filter
        ];

        return $this->getAll($filter);
    }

    /**
     * Create a Shopify custom collection
     *
     * @param array $payload
     * @return array
     */
    public function create(array $payload = []): array
    {
        $payload = ['custom_collection' => $payload];
        $path = BaseShopify::ADMIN_URI . Custom::CUSTOM_COLLECTIONS_URI;
        $response = $this->send(BaseShopify::METHOD_POST, $path, $payload);

        return $this->getFullResponse ? $response : $response['custom_collection'];
    }

    /**
     * Update a Shopify custom collection
     *
     * @param int $id
     * @param array $payload
     * @return array
     */
    public function update(int $id, array $payload = []): array
    {
        $payload = ['custom_collection' => $payload];
        $path = BaseShopify::ADMIN_URI . sprintf(Custom::CUSTOM_COLLECTION_URI, $id);
        $response = $this->send(BaseShopify::METHOD_PUT, $path, $payload);

        return $this->getFullResponse ? $response : $response['custom_collection'];
    }

    /**
     * Delete a Shopify custom collection
     *
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Custom::CUSTOM_COLLECTION_URI, $id);
        return $this->send(BaseShopify::METHOD_DELETE, $path);
    }
}