<?php

namespace Markc\ShopifyClient;

use Markc\ShopifyClient\Shopify\Collect;
use Markc\ShopifyClient\Shopify\Collection;
use Markc\ShopifyClient\Shopify\Customer;
use Markc\ShopifyClient\Shopify\Event;
use Markc\ShopifyClient\Shopify\Inventory\InventoryItem;
use Markc\ShopifyClient\Shopify\Inventory\InventoryLevel;
use Markc\ShopifyClient\Shopify\Inventory\Location;
use Markc\ShopifyClient\Shopify\Metafield;
use Markc\ShopifyClient\Shopify\Order;
use Markc\ShopifyClient\Shopify\PriceRule;
use Markc\ShopifyClient\Shopify\Product;
use Markc\ShopifyClient\Shopify\Shop;
use Markc\ShopifyClient\Shopify\Webhook;
use Markc\ShopifyClient\Shopify\Collection\Product as ProductCollection;

class Shopify
{
    /**
     * @return \Markc\ShopifyClient\Shopify\Collect
     */
    public function collect(): Collect
    {
        return (new Collect());
    }

    /**
     * @return \Markc\ShopifyClient\Shopify\Collection
     */
    public function collection(): Collection
    {
        return (new Collection());
    }

    /**
     * @return \Markc\ShopifyClient\Shopify\Collection\Custom
     */
    public function customCollection(): Collection\Custom
    {
        return (new Collection\Custom());
    }

    /**
     * @return \Markc\ShopifyClient\Shopify\Collection\Smart
     */
    public function smartCollection(): Collection\Smart
    {
        return (new Collection\Smart());
    }

    /**
     * @return \Markc\ShopifyClient\Shopify\Collection\Product
     */
    public function productCollection(): ProductCollection
    {
        return (new Collection\Product());
    }

    /**
     * @return \Markc\ShopifyClient\Shopify\Customer
     */
    public function customer(): Customer
    {
        return (new Customer());
    }

    /**
     * @return \Markc\ShopifyClient\Shopify\Customer\Address
     */
    public function customerAddress(): Customer\Address
    {
        return (new Customer\Address());
    }

    /**
     * @return \Markc\ShopifyClient\Shopify\Event
     */
    public function event(): Event
    {
        return (new Event());
    }

    /**
     * @return \Markc\ShopifyClient\Shopify\Metafield
     */
    public function metafield(): Metafield
    {
        return (new Metafield());
    }

    /**
     * @return \Markc\ShopifyClient\Shopify\Order
     */
    public function order(): Order
    {
        return (new Order());
    }

    /**
     * @return \Markc\ShopifyClient\Shopify\PriceRule
     */
    public function priceRule(): PriceRule
    {
        return (new PriceRule());
    }

    /**
     * @return \Markc\ShopifyClient\Shopify\PriceRule\Batch
     */
    public function priceRuleBatch(): PriceRule\Batch
    {
        return (new PriceRule\Batch());
    }

    /**
     * @return \Markc\ShopifyClient\Shopify\PriceRule\DiscountCode
     */
    public function discountCode(): PriceRule\DiscountCode
    {
        return (new PriceRule\DiscountCode());
    }

    /**
     * @return \Markc\ShopifyClient\Shopify\Product
     */
    public function product(): Product
    {
        return (new Product());
    }

    /**
     * @return \Markc\ShopifyClient\Shopify\Product\Image
     */
    public function productImage(): Product\Image
    {
        return (new Product\Image());
    }

    /**
     * @return \Markc\ShopifyClient\Shopify\Product\Variant
     */
    public function productVariant(): Product\Variant
    {
        return (new Product\Variant());
    }

    /**
     * @return \Markc\ShopifyClient\Shopify\Shop
     */
    public function shop(): Shop
    {
        return (new Shop());
    }

    /**
     * @return \Markc\ShopifyClient\Shopify\Webhook
     */
    public function webhook(): Webhook
    {
        return (new Webhook());
    }

    /**
     * @return \Markc\ShopifyClient\Shopify\Inventory\InventoryItem
     */
    public function inventoryItem(): InventoryItem
    {
        return (new InventoryItem());
    }

    /**
     * @return \Markc\ShopifyClient\Shopify\Inventory\InventoryLevel
     */
    public function inventoryLevel(): InventoryLevel
    {
        return (new InventoryLevel());
    }

    /**
     * @return \Markc\ShopifyClient\Shopify\Inventory\Location
     */
    public function location(): Location
    {
        return (new Location());
    }
}