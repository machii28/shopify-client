<?php

namespace Markc\ShopifyClient\Shopify;

class Metafield extends BaseShopify
{
    const CUSTOMER_METAFIELD_URI = '/customers/%s/metafields.json';
    const DRAFT_ORDER_METAFIELD_URI = '/draft_orders/%s/metafields.json';
    const ORDER_METAFIELD_URI = '/orders/%s/metafields.json';
    const PRODUCT_METAFIELD_URI = '/products/%s/metafields.json';
    const PRODUCT_VARIANT_METAFIELD_URI = '/product/%s/variants/%s/metafields.json';
    const COLLECTION_METAFIELD_URI = '/collections/%s/metafields.json';
    const SHOP_METAFIELD_URI = '/metafields.json';

    /**
     * Get the product metafields
     *
     * @param int $id
     * @param array $filter
     * @return array
     */
    public function product(int $id, array $filter = []): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Metafield::PRODUCT_METAFIELD_URI, $id);
        $response = $this->send(BaseShopify::ADMIN_URI, $path, $filter);

        return $this->getFullResponse ? $response : $response['metafields'];
    }

    /**
     * Get the product variant metafields
     *
     * @param int $productId
     * @param int $id
     * @param array $filter
     * @return array
     */
    public function variant(int $productId, int $id, array $filter = []): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Metafield::PRODUCT_VARIANT_METAFIELD_URI, $productId, $id);
        $response = $this->send(BaseShopify::ADMIN_URI, $path, $filter);

        return $this->getFullResponse ? $response : $response['metafields'];
    }

    /**
     * Get the order metafields
     *
     * @param int $id
     * @param array $filter
     * @return array
     */
    public function order(int $id, array $filter = []): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Metafield::ORDER_METAFIELD_URI, $id);
        $response = $this->send(BaseShopify::ADMIN_URI, $path, $filter);

        return $this->getFullResponse ? $response : $response['metafields'];
    }

    /**
     * Get the draft orders metafields
     *
     * @param int $id
     * @param array $filter
     * @return array
     */
    public function draftOrder(int $id, array $filter = []): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Metafield::DRAFT_ORDER_METAFIELD_URI, $id);
        $response = $this->send(BaseShopify::ADMIN_URI, $path, $filter);

        return $this->getFullResponse ? $response : $response['metafields'];
    }

    /**
     * Get the collection metafields
     *
     * @param int $id
     * @param array $filter
     * @return array
     */
    public function collection(int $id, array $filter = []): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Metafield::COLLECTION_METAFIELD_URI, $id);
        $response = $this->send(BaseShopify::ADMIN_URI, $path, $filter);

        return $this->getFullResponse ? $response : $response['metafields'];
    }

    /**
     * Get the customer metafields
     *
     * @param int $id
     * @param array $filter
     * @return array
     */
    public function customer(int $id, array $filter = []): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Metafield::CUSTOMER_METAFIELD_URI, $id);
        $response = $this->send(BaseShopify::ADMIN_URI, $path, $filter);

        return $this->getFullResponse ? $response : $response['metafields'];
    }

    /**
     * Get the shop metafields
     *
     * @return array
     */
    public function shop(): array
    {
        $path = BaseShopify::ADMIN_URI . Metafield::SHOP_METAFIELD_URI;
        $response = $this->send(BaseShopify::ADMIN_URI, $path);

        return $this->getFullResponse ? $response : $response['metafields'];
    }
}