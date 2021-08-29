<?php

namespace Markc\ShopifyClient\Shopify\Inventory;

use Markc\ShopifyClient\Shopify\BaseShopify;

class Location extends BaseShopify
{
    const LOCATIONS_URI = '/locations.json';
    const LOCATIONS_COUNT_URI = '/locations/count.json';
    const LOCATION_URI = '/locations/%s.json';
    const LOCATION_INVENTORY_LEVEL_URI = '/locations/%s/inventory_levels.json';

    /**
     * Get the paginated list of locations
     *
     * @param array $filter
     * @return array
     */
    public function get(array $filter = []): array
    {
        $path = BaseShopify::ADMIN_URI . Location::LOCATIONS_URI;
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['locations'];
    }

    /**
     * Get the count of locations based on filter
     *
     * @param array $filter
     * @return int
     */
    public function count(array $filter = []): int
    {
        $path = BaseShopify::ADMIN_URI . Location::LOCATIONS_COUNT_URI;
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['count'];
    }

    /**
     * Find single location
     *
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Location::LOCATION_URI, $id);
        $response = $this->send(BaseShopify::METHOD_GET, $path);

        return $this->getFullResponse ? $response : $response['locations'];
    }

    /**
     * Get all location based on filter
     *
     * @param array $filter
     * @return array
     */
    public function all(array $filter = []): array
    {
        $this->classCalled = get_class();
        $this->dataIndex = 'locations';
        $this->method = 'get';
        $this->arguments = [
            $filter
        ];

        return $this->getAll($filter);
    }

    /**
     * Get the inventory levels
     *
     * @param int $id
     * @return array
     */
    public function inventoryLevels(int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Location::LOCATION_INVENTORY_LEVEL_URI, $id);
        $response = $this->send(BaseShopify::METHOD_GET, $path);

        return $this->getFullResponse ? $response : $response['inventory_levels'];
    }
}