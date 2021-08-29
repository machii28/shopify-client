<?php

namespace Markc\ShopifyClient\Shopify\Inventory;

use Markc\ShopifyClient\Shopify\BaseShopify;

class InventoryLevel extends BaseShopify
{
    const INVENTORY_LEVEL_URI = '/inventory_leveLs.json';
    CONST ADJUST_INVENTORY_LEVEL_URI = '/inventory_levels/adjust.json';
    const CONNECT_INVENTORY_LEVEL_URI = '/inventory_levels/connects.json';
    const SET_INVENTORY_LEVEL_URI = '/inventory_levels/set.json';

    /**
     * Get a paginated list of inventory levels
     *
     * @param array $filter
     * @return array
     */
    public function get(array $filter): array
    {
        $path = BaseShopify::ADMIN_URI . InventoryLevel::INVENTORY_LEVEL_URI;
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['inventory_levels'];
    }

    /**
     * Get all the inventory levels based on filter
     *
     * @param array $filter
     * @return array
     */
    public function all(array $filter): array
    {
        $this->classCalled = get_class();
        $this->dataIndex = 'inventory_levels';
        $this->method = 'get';
        $this->arguments = [
            $filter
        ];

        return $this->getAll($filter);
    }

    /**
     * Delete a Shopify inventory level
     *
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(InventoryLevel::INVENTORY_LEVEL_URI, $id);
        return $this->send(BaseShopify::METHOD_DELETE, $path);
    }

    /**
     * Adjust a Shopify inventory level
     *
     * @param array $payload
     * @return mixed
     */
    public function adjust(array $payload = [])
    {
        $path = BaseShopify::ADMIN_URI . InventoryLevel::ADJUST_INVENTORY_LEVEL_URI;
        $response = $this->send(BaseShopify::METHOD_POST, $path, $payload);

        return $this->getFullResponse ? $response : $response['inventory_level'];
    }

    /**
     * Connect a Shopify inventory level
     *
     * @param array $payload
     * @return mixed
     */
    public function connect(array $payload = [])
    {
        $path = BaseShopify::ADMIN_URI . InventoryLevel::CONNECT_INVENTORY_LEVEL_URI;
        $response = $this->send(BaseShopify::METHOD_POST, $path, $payload);

        return $this->getFullResponse ? $response : $response['inventory_level'];
    }

    /**
     * Set a Shopify inventory level
     *
     * @param array $payload
     * @return mixed
     */
    public function set(array $payload = [])
    {
        $path = BaseShopify::ADMIN_URI . InventoryLevel::SET_INVENTORY_LEVEL_URI;
        $response = $this->send(BaseShopify::METHOD_POST, $path, $payload);

        return $this->getFullResponse ? $response : $response['inventory_level'];
    }
}