<?php

namespace Markc\ShopifyClient\Shopify\Collection;

use Markc\ShopifyClient\Shopify\BaseShopify;

class Product extends BaseShopify
{
    const COLLECTION_PRODUCTS_URI = '/collection/%s/products.json';

    /**
     * Get a paginated list of products under a collection
     *
     * @param int $collectionId
     * @param array $filter
     * @return array
     */
    public function get(int $collectionId, array $filter = []): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Product::COLLECTION_PRODUCTS_URI, $collectionId);
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['products'];
    }

    /**
     * Get all the products under a collection
     *
     * @param int $referenceId
     * @param array $filter
     * @return array
     */
    public function all(int $referenceId, array $filter = []): array
    {
        $this->classCalled = get_class();
        $this->dataIndex = 'products';
        $this->method = 'get';
        $this->arguments = [
            $referenceId,
            $filter
        ];

        return $this->getAll($filter);
    }
}