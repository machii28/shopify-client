<?php

namespace Markc\ShopifyClient\Shopify;

use Markc\ShopifyClient\Contracts\RestReferenceContract;

class Webhook extends BaseShopify implements RestReferenceContract
{
    const WEBHOOKS_URI = '/webhooks.json';
    const WEBHOOKS_COUNT_URI = '/webhooks/count.json';
    const WEBHOOK_URI = '/webhooks/%s.json';

    /**
     * Get a paginated list of webhooks
     *
     * @param array $filter
     * @return array
     */
    public function get(array $filter = []): array
    {
        $path = BaseShopify::ADMIN_URI . Webhook::WEBHOOKS_URI;
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['webhooks'];
    }

    /**
     * Get the count of webhooks based on filter
     *
     * @param array $filter
     * @return int
     */
    public function count(array $filter = []): int
    {
        $path = BaseShopify::ADMIN_URI . Webhook::WEBHOOKS_COUNT_URI;
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['count'];
    }

    /**
     * Find a single webhook
     *
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Webhook::WEBHOOK_URI, $id);
        $response = $this->send(BaseShopify::METHOD_GET, $path);

        return $this->getFullResponse ? $response : $response['webhook'];
    }

    /**
     * Get all the webhooks based on filter
     *
     * @param array $filter
     * @return array
     */
    public function all(array $filter = []): array
    {
        $this->classCalled = get_class();
        $this->dataIndex = 'webhooks';
        $this->method = 'get';
        $this->arguments = [
            $filter
        ];

        return $this->getAll($filter);
    }

    /**
     * Create a Shopify webhook
     *
     * @param array $payload
     * @return array
     */
    public function create(array $payload = []): array
    {
        $payload = ['webhook' => $payload];
        $path = BaseShopify::ADMIN_URI . Webhook::WEBHOOKS_URI;
        $response = $this->send(BaseShopify::METHOD_POST, $path, $payload);

        return $this->getFullResponse ? $response : $response['webhook'];
    }

    /**
     * Update a Shopify webhook
     *
     * @param int $id
     * @param array $payload
     * @return array
     */
    public function update(int $id, array $payload = []): array
    {
        $payload = ['webhook' => $payload];
        $path = BaseShopify::ADMIN_URI . sprintf(Webhook::WEBHOOK_URI, $id);
        $response = $this->send(BaseShopify::METHOD_PUT, $path, $payload);

        return $this->getFullResponse ? $response : $response['webhook'];
    }

    /**
     * Delete a Shopify webhook
     *
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Webhook::WEBHOOK_URI, $id);
        return $this->send(BaseShopify::METHOD_DELETE, $path);
    }
}