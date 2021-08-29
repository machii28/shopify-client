<?php

namespace Markc\ShopifyClient\Contracts;

interface SingleRestReferenceContract
{
    /**
     * Get the paginated list of data by reference
     *
     * @param int $referenceId
     * @param array $filter
     * @return mixed
     */
    public function get(int $referenceId, array $filter = []);

    /**
     * Get the count of data based on filter array and by reference
     *
     * @param int $referenceId
     * @param array $filter
     * @return mixed
     */
    public function count(int $referenceId, array $filter = []);

    /**
     * Get single data by reference
     *
     * @param int $referenceId
     * @param int $id
     * @return mixed
     */
    public function find(int $referenceId, int $id);

    /**
     * Get all the data by reference
     *
     * @param int $referenceId
     * @param array $filter
     * @return mixed
     */
    public function all(int $referenceId, array $filter = []);

    /**
     * Create a single data by reference
     *
     * @param int $referenceId
     * @param array $payload
     * @return mixed
     */
    public function create(int $referenceId, array $payload = []);

    /**
     * Update a single data by reference
     *
     * @param int $referenceId
     * @param int $id
     * @param array $payload
     * @return mixed
     */
    public function update(int $referenceId, int $id, array $payload = []);

    /**
     * Delete single shopify data
     *
     * @param int $referenceId
     * @param int $id
     * @return mixed
     */
    public function delete(int $referenceId, int $id);
}