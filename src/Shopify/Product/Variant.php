<?php

namespace Markc\ShopifyClient\Shopify\Product;

use Markc\ShopifyClient\Contracts\SingleRestReferenceContract;
use Markc\ShopifyClient\Shopify\BaseShopify;

class Variant extends BaseShopify implements SingleRestReferenceContract
{
    const PRODUCT_VARIANTS_URI = '/products/%s/variants.json';
    const PRODUCT_VARIANTS_COUNT_URI = '/product/%s/variants/count.json';
    const PRODUCT_VARIANT_URI = '/products/variants/%s.json';

    /**
     * Get a paginated list of product variant based on filter
     *
     * @param int $referenceId
     * @param array $filter
     * @return array
     */
    public function get(int $referenceId, array $filter = []): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Variant::PRODUCT_VARIANTS_URI, $referenceId);
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['variants'];
    }

    /**
     * Get the product variant based on filter
     *
     * @param int $referenceId
     * @param array $filter
     * @return int
     */
    public function count(int $referenceId, array $filter = []): int
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Variant::PRODUCT_VARIANTS_COUNT_URI, $referenceId);
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['count'];
    }

    /**
     * Find a single product variant
     *
     * @param int $referenceId
     * @param int $id
     * @return array
     */
    public function find(int $referenceId, int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Variant::PRODUCT_VARIANT_URI, $referenceId, $id);
        $response = $this->send(BaseShopify::METHOD_GET, $path);

        return $this->getFullResponse ? $response : $response['variants'];
    }

    /**
     * Get all the product variants based on filter
     *
     * @param int $referenceId
     * @param array $filter
     * @return array
     */
    public function all(int $referenceId, array $filter = []): array
    {
        $this->classCalled = get_class();
        $this->dataIndex = 'variants';
        $this->method = 'get';
        $this->arguments = [
            $referenceId,
            $filter
        ];

        return $this->getAll($filter);
    }

    /**
     * Create a Shopify product variant
     *
     * @param int $referenceId
     * @param array $payload
     * @return array
     */
    public function create(int $referenceId, array $payload = []): array
    {
        $payload = ['variant' => $payload];
        $path = BaseShopify::ADMIN_URI . sprintf(Variant::PRODUCT_VARIANTS_URI, $referenceId);
        $response = $this->send(BaseShopify::METHOD_POST, $path, $payload);

        return $this->getFullResponse ? $response : $response['variant'];
    }

    /**
     * Update a Shopify product variant
     *
     * @param int $referenceId
     * @param int $id
     * @param array $payload
     * @return array
     */
    public function update(int $referenceId, int $id, array $payload = []): array
    {
        $payload = ['variant' => $payload];
        $path = BaseShopify::ADMIN_URI . sprintf(Variant::PRODUCT_VARIANT_URI, $referenceId, $id);
        $response = $this->send(BaseShopify::METHOD_PUT, $path, $payload);

        return $this->getFullResponse ? $response : $response['variant'];
    }

    /**
     * Delete a Shopify product variant
     *
     * @param int $referenceId
     * @param int $id
     * @return array
     */
    public function delete(int $referenceId, int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Variant::PRODUCT_VARIANT_URI, $referenceId, $id);
        return $this->send(BaseShopify::METHOD_DELETE, $path);
    }
}