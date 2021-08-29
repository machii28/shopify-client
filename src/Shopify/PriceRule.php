<?php

namespace Markc\ShopifyClient\Shopify;

use Markc\ShopifyClient\Contracts\RestReferenceContract;

class PriceRule extends BaseShopify implements RestReferenceContract
{
    const PRICE_RULES_URI = '/price_rules.json';
    const PRICE_RULES_COUNT_URI = '/price_rules/counts.json';
    const PRICE_RULE_URI = '/price_rules/%s.json';

    /**
     * Get the paginated list of price rules
     *
     * @param array $filter
     * @return array
     */
    public function get(array $filter = []): array
    {
        $path = BaseShopify::ADMIN_URI . PriceRule::PRICE_RULES_URI;
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['price_rules'];
    }

    /**
     *  Get the count of price rule based on filter
     *
     * @param array $filter
     * @return int
     */
    public function count(array $filter = []): int
    {
        $path = BaseShopify::ADMIN_URI . PriceRule::PRICE_RULES_COUNT_URI;
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['count'];
    }

    /**
     * Find a single price rule
     *
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(PriceRule::PRICE_RULE_URI, $id);
        $response = $this->send(BaseShopify::METHOD_GET, $path);

        return $this->getFullResponse ? $response : $response['price_rule'];
    }

    /**
     * Get all the price rule based on filter
     *
     * @param array $filter
     * @return array
     */
    public function all(array $filter = []): array
    {
        $this->classCalled = get_class();
        $this->dataIndex = 'price_rules';
        $this->method = 'get';
        $this->arguments = [
            $filter
        ];

        return $this->getAll($filter);
    }

    /**
     * Create a Shopify price rule
     *
     * @param array $payload
     * @return array
     */
    public function create(array $payload = []): array
    {
        $payload = ['price_rule' => $payload];
        $path = BaseShopify::ADMIN_URI . PriceRule::PRICE_RULES_URI;
        $response = $this->send(BaseShopify::METHOD_POST, $path, $payload);

        return $this->getFullResponse ? $response : $response['price_rule'];
    }

    /**
     * Update a Shopify price rule
     *
     * @param int $id
     * @param array $payload
     * @return array
     */
    public function update(int $id, array $payload = []): array
    {
        $payload = ['price_rule' => $payload];
        $path = BaseShopify::ADMIN_URI . sprintf(PriceRule::PRICE_RULE_URI, $id);
        $response = $this->send(BaseShopify::METHOD_PUT, $path, $payload);

        return $this->getFullResponse ? $response : $response['price_rule'];
    }

    /**
     * Delete a Shopify price rule
     *
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(PriceRule::PRICE_RULE_URI, $id);

        return $this->send(BaseShopify::METHOD_DELETE, $path);
    }
}