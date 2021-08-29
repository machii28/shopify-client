<?php

namespace Markc\ShopifyClient\Shopify\Collection;

use Markc\ShopifyClient\Contracts\RestReferenceContract;
use Markc\ShopifyClient\Shopify\BaseShopify;

class Smart extends BaseShopify implements RestReferenceContract
{
    const SMART_COLLECTIONS_URI = '/smart_collections.json';
    const SMART_COLLECTIONS_COUNT_URI = '/smart_collections/count.json';
    const SMART_COLLECTION_URI = '/smart_collections/%s.json';

    /**
     * Get a paginated list of smart collections
     *
     * @param array $filter
     * @return array
     */
    public function get(array $filter = []): array
    {
        $path = BaseShopify::ADMIN_URI . Smart::SMART_COLLECTIONS_URI;
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['smart_collections'];
    }

    /**
     * Get the count of smart collections based on filter
     *
     * @param array $filter
     * @return int
     */
    public function count(array $filter = []): int
    {
        $path = BaseShopify::ADMIN_URI . Smart::SMART_COLLECTIONS_COUNT_URI;
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['count'];
    }

    /**
     * Find a single smart collections
     *
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Smart::SMART_COLLECTION_URI, $id);
        $response = $this->send(BaseShopify::METHOD_GET, $path);

        return $this->getFullResponse ? $response : $response['smart_collection'];
    }

    /**
     * Get all the smart collections based on filter
     *
     * @param array $filter
     * @return array
     */
    public function all(array $filter = []): array
    {
        $this->classCalled = get_class();
        $this->dataIndex = 'smart_collections';
        $this->method = 'get';
        $this->arguments = [
            $filter
        ];

        return $this->getAll($filter);
    }

    /**
     * Create a Shopify smart collection
     *
     * @param array $payload
     * @return array
     */
    public function create(array $payload): array
    {
        $payload = ['smart_collection' => $payload];
        $path = BaseShopify::ADMIN_URI . Smart::SMART_COLLECTIONS_URI;
        $response = $this->send(BaseShopify::METHOD_POST, $path, $payload);

        return $this->getFullResponse ? $response : $response['smart_collection'];
    }

    /**
     * Update a Shopify smart collection
     *
     * @param int $id
     * @param array $payload
     * @return array
     */
    public function update(int $id, array $payload): array
    {
        $payload = ['smart_collection' => $payload];
        $path = BaseShopify::ADMIN_URI . sprintf(Smart::SMART_COLLECTION_URI, $id);
        $response = $this->send(BaseShopify::METHOD_PUT, $path, $payload);

        return $this->getFullResponse ? $response : $response['smart_collection'];
    }

    /**
     * Delete a Shopify smart collection
     *
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Smart::SMART_COLLECTION_URI, $id);
        return $this->send(BaseShopify::METHOD_DELETE, $path);
    }
}