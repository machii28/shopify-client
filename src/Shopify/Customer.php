<?php

namespace Markc\ShopifyClient\Shopify;

use Markc\ShopifyClient\Contracts\RestReferenceContract;

class Customer extends BaseShopify implements RestReferenceContract
{
    const CUSTOMERS_URI = '/customers.json';
    const CUSTOMERS_COUNT_URI = '/customers/count.json';
    const CUSTOMER_URI = '/customers/%s.json';

    /**
     * Get the paginated list of customers
     *
     * @param array $filter
     * @return array
     */
    public function get(array $filter = []): array
    {
        $path = BaseShopify::ADMIN_URI . Customer::CUSTOMERS_URI;
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['customers'];
    }

    /**
     * Get the count of customers based on the filter parameter
     *
     * @param array $filter
     * @return int
     */
    public function count(array $filter = []): int
    {
        $path = BaseShopify::ADMIN_URI . Customer::CUSTOMERS_COUNT_URI;
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response: $response['count'];
    }

    /**
     * Find the single customer
     *
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Customer::CUSTOMER_URI, $id);
        $response = $this->send(BaseShopify::METHOD_GET, $path);

        return $this->getFullResponse ? $response : $response['customer'];
    }

    /**
     * Get all the customers based on the filter parameter
     *
     * @param array $filter
     * @return array
     */
    public function all(array $filter = []): array
    {
        $this->classCalled = get_class();
        $this->dataIndex = 'customers';
        $this->method = 'get';
        $this->arguments = [
            $filter
        ];

        return $this->getAll($filter);
    }

    /**
     * Create a Shopify customer
     *
     * @param array $payload
     * @return array
     */
    public function create(array $payload = []): array
    {
        $path = BaseShopify::ADMIN_URI . Customer::CUSTOMERS_URI;
        $payload = ['customer' => $payload];
        $response = $this->send(BaseShopify::METHOD_POST, $path, $payload);

        return $this->getFullResponse ? $response : $response['customer'];
    }

    /**
     * Update a Shopify customer
     *
     * @param int $id
     * @param array $payload
     * @return array
     */
    public function update(int $id, array $payload = []): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Customer::CUSTOMER_URI, $id);
        $payload = ['customer' => $payload];
        $response = $this->send(BaseShopify::METHOD_POST, $path, $payload);

        return $this->getFullResponse ? $response : $response['customer'];
    }

    /**
     * Delete a Shopify customer
     *
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Customer::CUSTOMER_URI, $id);

        return $this->send(BaseShopify::METHOD_DELETE, $path);
    }
}