<?php

namespace Markc\ShopifyClient\Helpers\Traits;

trait AllTrait
{
    /**
     * Class where the getAll method is called
     *
     * @var string
     */
    protected $classCalled = '';

    /**
     * Data index of response from shopify
     *
     * @var string
     */
    protected $dataIndex = '';

    /**
     * Parsed data response
     *
     * @var array
     */
    protected $data = [];

    /**
     * Next page id from the Shopify paginated response
     *
     * @var bool
     */
    protected $nextPageId = false;

    /**
     * Method being used by the class that called the getAll method
     *
     * @var string
     */
    protected $method = '';

    /**
     * Method parameters used by the class that called the getAll method
     *
     * @var array
     */
    protected $arguments = [];

    /**
     * Sets the payload for all data
     *
     * @param array $filter
     * @return array
     */
    protected function setPayload(array $filter = []): array
    {
        $payload = [];

        unset($filter['page']);

        $payload['limit'] = isset($filter['limit']) && !empty($filter['limit']) ? $filter['limit'] : 250;

        if (isset($filter['fields']) && !empty($filter['fields'])) {
            $payload['fields'] = $filter['fields'];
        }

        $payload += $filter;

        return $payload;
    }

    /**
     * Get all data
     *
     * @param array $payload
     * @return array
     */
    public function getAll(array $payload = []): array
    {
        $data = [];
        $count = 0;
        $method = $this->method;
        $this->getFullResponse = true;
        $payload = $this->setPayload($payload);

        do {

            if ($this->nextPageId) {
                $payload['page_info'] = $this->nextPageId;
            }

            if ($count > 0) {
                if (isset($payload['ids'])) {
                    unset($payload['ids']);
                }
            }

            $response = $this->classCalled::$method(...$this->arguments);

            if (isset($response['errors']) && $response['errors'] === true) {
                return $response;
            }

            $responseArray = json_decode(
                json_encode($response['body'][$this->dataIndex]),
                true
            );

            $data = array_merge($data, $responseArray);
            $count++;
        } while($this->nextPageId === false);

        return $data;
    }
}