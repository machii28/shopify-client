<?php

namespace Markc\ShopifyClient\Shopify;

class Event extends BaseShopify
{
    const EVENTS_URI = '/events.json';
    const EVENTS_COUNT_URI = '/events/count.json';
    const EVENT_URI = '/events/%s.json';

    /**
     * Get the paginated list of events
     *
     * @param array $filter
     * @return array
     */
    public function get(array $filter = []): array
    {
        $path = BaseShopify::ADMIN_URI . Event::EVENTS_URI;
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['events'];
    }

    /**
     * Get the count of the events based on the filter parameter
     *
     * @param array $filter
     * @return int
     */
    public function count(array $filter = []): int
    {
        $path = BaseShopify::ADMIN_URI . Event::EVENTS_COUNT_URI;
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['count'];
    }

    /**
     * Find the single event
     *
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Event::EVENT_URI, $id);
        $response = $this->send(BaseShopify::METHOD_GET, $path);

        return $this->getFullResponse ? $response : $response['event'];
    }

    /**
     * Get all the events based on the filter parameter
     *
     * @param array $filter
     * @return array
     */
    public function all(array $filter = []): array
    {
        $this->classCalled = get_class();
        $this->dataIndex = 'events';
        $this->method = 'get';
        $this->arguments = [
            $filter
        ];

        return $this->getAll($filter);
    }
}