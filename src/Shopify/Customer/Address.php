<?php

namespace Markc\ShopifyClient\Shopify\Customer;

use Markc\ShopifyClient\Shopify\BaseShopify;

class Address extends BaseShopify
{
    const CUSTOMER_ADDRESSES_URI = '/customers/%s/addresses.json';
    const CUSTOMER_ADDRESS_URI = '/customers/%s/addresses/%s.json';
    const CUSTOMER_ADDRESS_SET_DEFAULT_URI = '/customers/%s/addresses/%s/default.json';

    /**
     * Get a paginated list of customer address
     *
     * @param int $referenceId
     * @param array $filter
     * @return array
     */
    public function get(int $referenceId, array $filter = []): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Address::CUSTOMER_ADDRESSES_URI, $referenceId);
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['addresses'];
    }

    /**
     * Find a single customer address
     *
     * @param int $referenceId
     * @param int $id
     * @return array
     */
    public function find(int $referenceId, int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Address::CUSTOMER_ADDRESS_URI, $referenceId, $id);
        $response = $this->send(BaseShopify::METHOD_GET, $path);

        return $this->getFullResponse ? $response : $response['customer_address'];
    }

    /**
     * Get all the customer address
     *
     * @param int $referenceId
     * @param array $filter
     * @return array
     */
    public function all(int $referenceId, array $filter = []): array
    {
        $this->classCalled = get_class();
        $this->dataIndex = 'addresses';
        $this->method = 'get';
        $this->arguments = [
            $referenceId,
            $filter
        ];

        return $this->getAll($filter);
    }

    /**
     * Create a Shopify customer address
     *
     * @param int $referenceId
     * @param array $payload
     * @return array
     */
    public function create(int $referenceId, array $payload = []): array
    {
        $payload = ['address' => $payload];
        $path = BaseShopify::ADMIN_URI . sprintf(Address::CUSTOMER_ADDRESSES_URI, $referenceId);
        $response = $this->send(BaseShopify::METHOD_POST, $path, $payload);

        return $this->getFullResponse ? $response : $response['customer_address'];
    }

    /**
     * Update a Shopify customer address
     *
     * @param int $referenceId
     * @param int $id
     * @param array $payload
     * @return array
     */
    public function update(int $referenceId, int $id, array $payload = []): array
    {
        $payload = ['address' => $payload];
        $path = BaseShopify::ADMIN_URI . sprintf(Address::CUSTOMER_ADDRESS_URI, $referenceId, $id);
        $response = $this->send(BaseShopify::METHOD_PUT, $path, $payload);

        return $this->getFullResponse ? $response : $response['customer_address'];
    }

    /**
     * Delete a Shopify customer address
     *
     * @param int $referenceId
     * @param int $id
     * @return array
     */
    public function delete(int $referenceId, int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Address::CUSTOMER_ADDRESS_URI, $referenceId, $id);

        return $this->send(BaseShopify::METHOD_DELETE, $path);
    }

    /**
     * Sets the default address for a customer
     *
     * @param int $customerId
     * @param int $id
     * @return array
     */
    public function setDefault(int $customerId, int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Address::CUSTOMER_ADDRESS_SET_DEFAULT_URI, $customerId, $id);
        $response = $this->send(BaseShopify::METHOD_PUT, $path);

        return $this->getFullResponse ? $response : $response['customer_address'];
    }
}