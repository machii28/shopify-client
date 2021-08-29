<?php

namespace Markc\ShopifyClient\Shopify\Product;

use Markc\ShopifyClient\Contracts\SingleRestReferenceContract;
use Markc\ShopifyClient\Shopify\BaseShopify;

class Image extends BaseShopify implements SingleRestReferenceContract
{
    const PRODUCT_IMAGES_URI = '/products/%s/images.json';
    const PRODUCT_IMAGES_COUNT_URI = '/products/%s/images/count.json';
    const PRODUCT_IMAGE_URI = '/products/%s/images/%s.json';

    /**
     * Get a paginated list of product images
     *
     * @param int $referenceId
     * @param array $filter
     * @return array
     */
    public function get(int $referenceId, array $filter = []): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Image::PRODUCT_IMAGES_URI, $referenceId);
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['images'];
    }

    /**
     * Get the count of product image based on filter
     *
     * @param int $referenceId
     * @param array $filter
     * @return int
     */
    public function count(int $referenceId, array $filter = []): int
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Image::PRODUCT_IMAGES_COUNT_URI, $referenceId);
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['count'];
    }

    /**
     * Find a single product image
     *
     * @param int $referenceId
     * @param int $id
     * @return array
     */
    public function find(int $referenceId, int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Image::PRODUCT_IMAGE_URI, $referenceId, $id);
        $response = $this->send(BaseShopify::METHOD_GET, $path);

        return $this->getFullResponse ? $response : $response['image'];
    }

    /**
     * Get all the product image based on filter
     *
     * @param int $referenceId
     * @param array $filter
     * @return array
     */
    public function all(int $referenceId, array $filter = []): array
    {
        $this->classCalled = get_class();
        $this->dataIndex = 'images';
        $this->method = 'get';
        $this->arguments = [
            $referenceId,
            $filter
        ];

        return $this->getAll($filter);
    }

    /**
     * Create a Shopify product image
     *
     * @param int $referenceId
     * @param array $payload
     * @return array
     */
    public function create(int $referenceId, array $payload = []): array
    {
        $payload = ['image' => $payload];
        $path = BaseShopify::ADMIN_URI . sprintf(Image::PRODUCT_IMAGES_URI, $referenceId);
        $response = $this->send(BaseShopify::METHOD_POST, $path, $payload);

        return $this->getFullResponse ? $response : $response['image'];
    }

    /**
     * Update a Shopify product image
     *
     * @param int $referenceId
     * @param int $id
     * @param array $payload
     * @return array
     */
    public function update(int $referenceId, int $id, array $payload = []): array
    {
        $payload = ['image' => $payload];
        $path = BaseShopify::ADMIN_URI . sprintf(Image::PRODUCT_IMAGE_URI, $referenceId, $id);
        $response = $this->send(BaseShopify::METHOD_PUT, $path, $payload);

        return $this->getFullResponse ? $response : $response['image'];
    }

    /**
     * Delete a Shopify product image
     *
     * @param int $referenceId
     * @param int $id
     * @return array
     */
    public function delete(int $referenceId, int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Image::PRODUCT_IMAGE_URI, $referenceId, $id);
        return $this->send(BaseShopify::METHOD_DELETE, $path);
    }
}