<?php

namespace Markc\ShopifyClient\Shopify\Inventory;

use Markc\ShopifyClient\Shopify\BaseShopify;

class InventoryItem extends BaseShopify
{
    const INVENTORY_ITEMS_URI = '/inventory_items.json';
    const INVENTORY_ITEM_URI = '/inventory_items/%s.json';

    /**
     * Get a paginated list of inventory items
     *
     * @param array $filter
     * @return array
     */
    public function get(array $filter = []): array
    {
        $path = BaseShopify::ADMIN_URI . InventoryItem::INVENTORY_ITEMS_URI;
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['inventory_items'];
    }

    /**
     * Find a single inventory item
     *
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        $path = BaseShopify::ADMIN_URI . sprintf(InventoryItem::INVENTORY_ITEM_URI, $id);
        $response = $this->send(BaseShopify::METHOD_GET, $path);

        return $this->getFullResponse ? $response : $response['inventory_item'];
    }

    /**
     * Returns all the inventory items
     *
     * @param array $filter
     * @return array
     */
    public function all(array $filter = []): array
    {
        $this->classCalled = get_class();
        $this->dataIndex = 'inventory_items';
        $this->method = 'get';
        $this->arguments = [
            $filter
        ];

        return $this->getAll($filter);
    }

    /**
     * Update a Shopify inventory item
     *
     * @param int $id
     * @param array $payload
     * @return mixed
     */
    public function update(int $id, array $payload = [])
    {
        $payload = ['inventory_item' => $payload];
        $path = BaseShopify::ADMIN_URI . sprintf(InventoryItem::INVENTORY_ITEM_URI, $id);
        $response = $this->send(BaseShopify::METHOD_PUT, $path, $payload);

        return $this->getFullResponse ? $response : $response['inventory_items'];
    }
}