<?php

namespace Markc\ShopifyClient\Shopify;

use Markc\ShopifyClient\Contracts\RestReferenceContract;

class Product extends BaseShopify implements RestReferenceContract
{
    const PRODUCTS_URI = '/products.json';
    const PRODUCT_COUNT_URI = '/products/count.json';
    const PRODUCT_URI = '/products/%s.json';

    /**
     * Get a paginated list of products
     *
     * @param array $filter
     * @return array
     */
    public function get(array $filter = []): array
    {
        $path = BaseShopify::ADMIN_URI . Product::PRODUCT_URI;
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['products'];
    }

    /**
     * Get the count of products based on filter
     *
     * @param array $filter
     * @return int
     */
    public function count(array $filter = []): int
    {
        $path = BaseShopify::ADMIN_URI . Product::PRODUCT_COUNT_URI;
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['count'];
    }

    /**
     * Find a single product
     *
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Product::PRODUCT_URI, $id);
        $response = $this->send(BaseShopify::METHOD_GET, $path);

        return $this->getFullResponse ? $response : $response['product'];
    }

    /**
     * Get all the products based on filter
     *
     * @param array $filter
     * @return array
     */
    public function all(array $filter = []): array
    {
        $this->classCalled = get_class();
        $this->dataIndex = 'products';
        $this->method = 'get';
        $this->arguments = [
            $filter
        ];

        return $this->getAll($filter);
    }

    /**
     * Create a Shopify product
     *
     * @param array $payload
     * @return array
     */
    public function create(array $payload = []): array
    {
        $payload = ['product' => $payload];
        $path = BaseShopify::ADMIN_URI . Product::PRODUCTS_URI;
        $response = $this->send(BaseShopify::METHOD_POST, $path, $payload);

        return $this->getFullResponse ? $response : $response['product'];
    }

    /**
     * Update a Shopify product
     *
     * @param int $id
     * @param array $payload
     * @return array
     */
    public function update(int $id, array $payload = []): array
    {
        $payload = ['product' => $payload];
        $path = BaseShopify::ADMIN_URI . sprintf(Product::PRODUCT_URI, $id);
        $response = $this->send(BaseShopify::METHOD_PUT, $path, $payload);

        return $this->getFullResponse ? $response : $response['product'];
    }

    /**
     * Delete a Shopify product
     *
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Product::PRODUCT_URI, $id);

        return $this->send(BaseShopify::METHOD_DELETE, $path);
    }
}