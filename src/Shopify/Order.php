<?php

namespace Markc\ShopifyClient\Shopify;

use Markc\ShopifyClient\Contracts\RestReferenceContract;

class Order extends BaseShopify implements RestReferenceContract
{
    const ORDERS_URI = '/orders.json';
    const ORDERS_COUNT_URI = '/orders/count.json';
    const ORDER_URI = '/orders/%s.json';

    /**
     * Get the paginated list of orders
     *
     * @param array $filter
     * @return array
     */
    public function get(array $filter = []): array
    {
        $path = BaseShopify::ADMIN_URI . Order::ORDERS_URI;
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['orders'];
    }

    /**
     * Get the count of orders based on the filter parameter
     *
     * @param array $filter
     * @return int
     */
    public function count(array $filter = []): int
    {
        $path = BaseShopify::ADMIN_URI . Order::ORDERS_COUNT_URI;
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['count'];
    }

    /**
     * Find the single order
     *
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Order::ORDER_URI, $id);
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['order'];
    }

    /**
     * GEt all orders based on the filter
     *
     * @param array $filter
     * @return array
     */
    public function all(array $filter = []): array
    {
        $this->classCalled = get_class();
        $this->dataIndex = 'orders';
        $this->method = 'get';
        $this->arguments = [
            $filter
        ];

        return $this->getAll($filter);
    }

    /**
     * Create a Shopify order
     *
     * @param array $payload
     * @return array
     */
    public function create(array $payload = []): array
    {
        $payload = ['order' => $payload];
        $path = BaseShopify::ADMIN_URI . Order::ORDERS_URI;
        $response = $this->send(BaseShopify::METHOD_POST, $path, $payload);

        return $this->getFullResponse ? $response : $response['order'];
    }

    /**
     * Update a Shopify order
     *
     * @param int $id
     * @param array $payload
     * @return array
     */
    public function update(int $id, array $payload = []): array
    {
        $payload = ['order' => $payload];
        $path = BaseShopify::ADMIN_URI . sprintf(Order::ORDER_URI, $id);
        $response = $this->send(BaseShopify::METHOD_PUT, $path, $payload);

        return $this->getFullResponse ? $response : $response['order'];
    }

    /**
     * Delete a Shopify order
     *
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Order::ORDER_URI, $id);

        return $this->send(BaseShopify::METHOD_DELETE, $path);
    }
}