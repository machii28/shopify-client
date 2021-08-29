<?php

namespace Markc\ShopifyClient\Shopify;

class Collect extends BaseShopify
{
    const COLLECTS_URI = '/collects.json';
    const COLLECTS_COUNT_URI = '/collects/count.json';
    const COLLECT_URI = '/collect/%s.json';

    /**
     * Get the paginated list of collects
     *
     * @param array $filter
     * @return array
     */
    public function get(array $filter = []): array
    {
        $path = BaseShopify::ADMIN_URI . Collect::COLLECTS_URI;
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['collects'];
    }

    /**
     * Get the count of collects based on the filter parameter
     *
     * @param array $filter
     * @return int
     */
    public function count(array $filter = []): int
    {
        $path = BaseShopify::ADMIN_URI . Collect::COLLECTS_COUNT_URI;
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['count'];
    }

    /**
     * Find the single collect
     *
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Collect::COLLECT_URI, $id);
        $response = $this->send(BaseShopify::METHOD_GET, $path);

        return $this->getFullResponse ? $response : $response['collect'];
    }

    /**
     * Get all collects based on the filter parameter
     *
     * @param array $filter
     * @return array
     */
    public function all(array $filter = []): array
    {
        $this->classCalled = get_class();
        $this->dataIndex = 'collects';
        $this->method = 'get';
        $this->arguments = [
            $filter
        ];

        return $this->getAll($filter);
    }

    /**
     * Create a Shopify collect
     *
     * @param array $payload
     * @return mixed
     */
    public function create(array $payload = [])
    {
        $path = BaseShopify::ADMIN_URI . Collect::COLLECTS_URI;
        $payload = ['collect' => $payload];
        $response = $this->send(BaseShopify::METHOD_POST, $path, $payload);

        return $this->getFullResponse ? $response : $response['collect'];
    }

    /**
     * Delete a Shopify collect
     *
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Collect::COLLECT_URI, $id);

        return $this->send(BaseShopify::METHOD_DELETE, $path);
    }
}