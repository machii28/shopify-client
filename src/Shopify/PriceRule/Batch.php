<?php

namespace Markc\ShopifyClient\Shopify\PriceRule;

use Markc\ShopifyClient\Shopify\BaseShopify;

class Batch extends BaseShopify
{
    const PRICE_RULE_BATCHES_URI = '/price_rules/%s/batch.json';
    const PRICE_RULE_BATCH_URI = '/price_rules/%s/batch/%s.json';
    const PRICE_RULE_BATCH_DISCOUNT_CODE_URI = '/price_rules/%s/batch/%s/discount.json';

    /**
     * Create a batch create job for a price rule
     *
     * @param int $priceRuleId
     * @param array $payload
     * @return mixed
     */
    public function create(int $priceRuleId, array $payload = [])
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Batch::PRICE_RULE_BATCHES_URI, $priceRuleId);
        $response = $this->send(BaseShopify::METHOD_POST, $path, $payload);

        return $this->getFullResponse ? $response : $response['discount_code_creation'];
    }

    /**
     * Find single batch for a price rule
     *
     * @param int $priceRuleId
     * @param int $id
     * @return mixed
     */
    public function find(int $priceRuleId, int $id)
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Batch::PRICE_RULE_BATCH_URI, $priceRuleId, $id);
        $response = $this->send(BaseShopify::METHOD_GET, $path);

        return $this->getFullResponse ? $response : $response['discount_code_creation'];
    }

    /**
     * Get the list of discount codes under batch
     *
     * @param int $priceRuleId
     * @param int $id
     * @return mixed
     */
    public function discountCodes(int $priceRuleId, int $id)
    {
        $path = BaseShopify::ADMIN_URI . sprintf(Batch::PRICE_RULE_BATCH_DISCOUNT_CODE_URI, $priceRuleId, $id);
        $response = $this->send(BaseShopify::METHOD_GET, $path);

        return $this->getFullResponse ? $response : $response['discount_codes'];
    }
}