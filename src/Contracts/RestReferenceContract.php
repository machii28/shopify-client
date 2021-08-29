<?php

namespace Markc\ShopifyClient\Contracts;

interface RestReferenceContract
{
    /**
     * Get the paginated list of data
     *
     * @param array $filter
     * @return array
     */
    public function get(array $filter = []): array;

    /**
     * Get the count of data based on filter array
     *
     * @param array $filter
     * @return int
     */
    public function count(array $filter = []): int;

    /**
     * Get single data
     *
     * @param int $id
     * @return array
     */
    public function find(int $id): array;

    /**
     * Get all the data
     *
     * @param array $filter
     * @return array
     */
    public function all(array $filter): array;

    /**
     * Create a single data
     *
     * @param array $payload
     * @return array
     */
    public function create(array $payload): array;

    /**
     * Update a single data
     *
     * @param int $id
     * @param array $payload
     * @return array
     */
    public function update(int $id, array $payload): array;

    /**
     * Delete single shopify data
     *
     * @param int $id
     * @return array
     */
    public function delete(int $id): array;
}