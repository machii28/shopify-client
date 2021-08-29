<?php

namespace Markc\ShopifyClient\Shopify;

use Markc\ShopifyClient\Shopify\Collection\Custom;
use Markc\ShopifyClient\Shopify\Collection\Smart;

class Collection extends BaseShopify
{
    const COLLECTIONS_URI = '/collections/%s.json';

    /**
     * Find a single collection
     *
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Collection::COLLECTIONS_URI, $id);
        $response = $this->send(BaseShopify::METHOD_GET, $path);

        return $this->getFullResponse ? $response : $response['collection'];
    }

    /**
     * Return all the collections
     *
     * @param array $filter
     * @return array
     */
    public function all(array $filter = []): array
    {
        $smart = new Smart();
        $custom = new Custom();

        $smartCollections = collect($smart->all($filter))->map(function (&$smart) {
            $smart['collection_type'] = 'smart';
            return $smart;
        })->toArray();

        $customCollection = collect($custom->all($filter))->map(function (&$custom) {
            $custom['collection_type'] = 'custom';
            return $custom;
        })->toArray();

        return array_merge($smartCollections, $customCollection);
    }

    /**
     * Get the collection products
     *
     * @param int $collectionId
     * @param array $filter
     * @return array
     */
    public function products(int $collectionId, array $filter = []): array
    {
        return (new Collection\Product())->get($collectionId, $filter);
    }

    /**
     * Return all the collection products
     *
     * @param int $collectionId
     * @param array $filter
     * @return array
     */
    public function allProducts(int $collectionId, array $filter = []): array
    {
        return (new Collection\Product())->all($collectionId, $filter);
    }
}