<?php

namespace Markc\ShopifyClient\Shopify\PriceRule;

use Markc\ShopifyClient\Contracts\SingleRestReferenceContract;
use Markc\ShopifyClient\Shopify\BaseShopify;

class DiscountCode extends BaseShopify implements SingleRestReferenceContract
{
    const DISCOUNT_CODES_URI = '/price_rules/%s/discount_codes.json';
    const DISCOUNT_CODES_COUNT_URI = '/price_rules/%s/discount_codes/count.json';
    const DISCOUNT_CODE_URI = '/price_rules/%s/discount_codes/%s.json';

    /**
     * Return a paginated list of discount codes
     *
     * @param int $referenceId
     * @param array $filter
     * @return mixed
     */
    public function get(int $referenceId, array $filter = [])
    {
        $path = BaseShopify::ADMIN_URI . sprintf(DiscountCode::DISCOUNT_CODES_URI, $referenceId);
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['discount_codes'];
    }

    /**
     * Get the count of discount codes for a price rule based on filter
     *
     * @param int $referenceId
     * @param array $filter
     * @return int
     */
    public function count(int $referenceId, array $filter = []): int
    {
        $path = BaseShopify::ADMIN_URI . sprintf(DiscountCode::DISCOUNT_CODES_COUNT_URI, $referenceId);
        $response = $this->send(BaseShopify::METHOD_GET, $path, $filter);

        return $this->getFullResponse ? $response : $response['count'];
    }

    /**
     * Find a single discount code
     *
     * @param int $referenceId
     * @param int $id
     * @return array
     */
    public function find(int $referenceId, int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(DiscountCode::DISCOUNT_CODE_URI, $referenceId, $id);
        $response = $this->send(BaseShopify::METHOD_GET, $path);

        return $this->getFullResponse ? $response : $response['discount_code'];
    }

    /**
     * Get all the discount codes for a price rule based on a filter
     *
     * @param int $referenceId
     * @param array $filter
     * @return array
     */
    public function all(int $referenceId, array $filter = []): array
    {
        $this->classCalled = get_class();
        $this->dataIndex = 'discount_codes';
        $this->method = 'get';
        $this->arguments = [
            $referenceId,
            $filter
        ];

        return $this->getAll($filter);
    }

    /**
     * Create a Shopify discount code
     *
     * @param int $referenceId
     * @param array $payload
     * @return array
     */
    public function create(int $referenceId, array $payload = []): array
    {
        $payload = ['discount_code' => $payload];
        $path = BaseShopify::ADMIN_URI . sprintf(DiscountCode::DISCOUNT_CODES_URI, $referenceId);
        $response = $this->send(BaseShopify::METHOD_POST, $path, $payload);

        return $this->getFullResponse ? $response : $response['discount_code'];
    }

    /**
     * Update a Shopify discount code
     *
     * @param int $referenceId
     * @param int $id
     * @param array $payload
     * @return array
     */
    public function update(int $referenceId, int $id, array $payload = []): array
    {
        $payload = ['discount_code' => $payload];
        $path = BaseShopify::ADMIN_URI . sprintf(DiscountCode::DISCOUNT_CODE_URI, $referenceId, $id);
        $response = $this->send(BaseShopify::METHOD_POST, $path, $payload);

        return $this->getFullResponse ? $response : $response['discount_code'];
    }

    /**
     * Delete a Shopify discount code
     *
     * @param int $referenceId
     * @param int $id
     * @return array
     */
    public function delete(int $referenceId, int $id): array
    {
        $path = BaseShopify::ADMIN_URI . sprintf(DiscountCode::DISCOUNT_CODE_URI, $referenceId, $id);
        return $this->send(BaseShopify::METHOD_DELETE, $path);
    }
}