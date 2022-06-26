## Shopify Client

A Shopify wrapper for osiset/basic-shopify-api.

### Installation

You can install the package via composer:

```bash
composer require markc/shopify-client
```

After the installation run the `php artisan vendor:publish --tag=shopify-client-config` to publish the 
config file. 

**In able to make a call you need to set the shopify_access_token by setting it through 
config(['shopify.access_token', {{shopif_access_token_here}}])**

### TODO
* Implement Graph QL Endpoints
* Create a single instance of access token

### Usage

Before using the package configuration is needed to set up in the `.env` file

```config
SHOPIFY_API_VERSION - version of the Shopify API used
SHOPIFY_API_KEY - the api key issued by Shopify
SHOPIFY_ACCESS_TOKEN - the access token issued by Shopify
SHOPIFY_IS_PRIVATE_APP - sets if the app is set to be used privately
SHOPIFY_SHOP - Hostname of the Shopify Store that uses the package
```

#### Classes
* Collect
* Collection
  - Smart
  - Custom
  - Product  
* Customer
  - CustomerAddress
* Event
* Metafield
* Order
* PriceRule
  - Batch
  - DiscountCode  
* Product
  - Image
  - Variant  
* Shop
* Webhook
* InventoryItem
* InventoryLevel
* Location

#### Facades
* ShopifyCollect
* ShopifyCollection
* ShopifyCollectionProduct
* ShopifyCustomCollection
* ShopifyCustomer
* ShopifyCustomerAddress
* ShopifyDiscountCode
* ShopifyEvent
* ShopifyInventoryItem
* ShopifyInventoryLevel
* ShopifyLocation
* ShopifyMetafield
* ShopifyOrder
* ShopifyPriceRule
* ShopifyPriceRuleBatch
* ShopifyProduct
* ShopifyProductCollection
* ShopifyProductImage
* ShopifyProductVariant
* ShopifyShop
* ShopifySmartCollection
* ShopifyWebhook


#### Functions

##### Collect
* `get(array $filter = [])`
  - Get the paginated list of collects
* `count(array $filter = [])`
  - Get the count of collects based on the filter parameter
* `find(int $id)`
  - Find the single collect
* `all(array $filter = [])`
  - Get all collects based on the filter parameter
* `create(array $payload = [])`
  - Create a Shopify collect
* `delete(int $id)`
  - Delete a Shopify collect
    
##### Collection
* `find(int $id)`
  - Find a single collection
* `all(array $fiter = [])`
  - Return all the collections
* `products(int $collectionId, array $filter = [])`
  - Get the collection products
* `allProducts(int $collectionId, array $filter = [])`
  - Return all the collection products
    
##### Customer
* `get(arrray $filter = [])`
  - Get the paginated list of customers
* `count(array $filter = [])`
  - Get the count of customers based on the filter parameter
* `find(int $id)`
  - Find the single customer
* `all(array $filter = [])`
  - Get all the customers based on the filter parameter
* `create(array $payload = [])`
  - Create a Shopify customer
* `update(int $id, array $payload = [])`
  - Update a Shopify customer
* `delete(int $id)`
  - Delete a Shopify customer
    
##### Event
* `get(array $filter = [])`
  - Get the paginated list of events
* `count(array $filter = [])`
  - Get the count of the events based on the filter parameter
* `find(int $id)`
  - Find the single event
* `all(array $filter = [])`
  - Get all the events based on the filter parameter
    
##### Metafield
* `product(int $id, array $filter = [])`
  - Get the product metafields
* `variant(int $productId, int $id, array $filter = [])`
  - Get the product variant metafields
* `order(int $id, array $filter = [])`
  - Get the order metafields
* `draftOrder(int $id, array $filter = [])`
  - Get the draft orders metafields
* `collection(int $id, array $filter = [])`
  - Get the collection metafields
* `customer(int $id, array $filter = [])`
  - Get the customer metafields
* `shop()`
  - Get the shop metafields
    
##### Order
* `get(array $filter = [])`
  - Get a paginated list of orders
* `count(array $filter = [])`
  - Get the count of orders based on filter
* `find(int $id)`
  - Find a single order
* `all(array $filter = [])`
  - Get all the orders based on filter
* `create(array $payload = [])`
  - Create a Shopify order
* `update(int $id, array $payload = [])`
  - Update a Shopify order
* `delete(int $id)`
  - Delete a Shopify order

##### Price Rule
* `get(array $filter = [])`
  - Get a paginated list of price rules
* `count(array $filter = [])`
  - Get the count of price rules based on filter
* `find(int $id)`
  - Find a single price rule
* `all(array $filter = [])`
  - Get all the price rule based on filter
* `create(array $payload = [])`
  - Create a Shopify price rule
* `update(int $id, array $payload = [])`
  - Update a Shopify price rule
* `delete(int $id)`
  - Delete a Shopify price rule
    
##### Product
* `get(array $filter = [])`
  - Get a paginated list of products
* `count(array $filter = [])`
  - Get the count of products based on filter
* `find(int $id)`
  - Find a single product
* `all(array $filter = [])`
  - Get all the product based on filter
* `create(array $payload = [])`
  - Create a Shopify product
* `update(int $id, array $payload = [])`
  - Update a Shopify product
* `delete(int $id)`
  - Delete a Shopify product
    
##### Shop
* `get()`
  - Get the shop information
    
##### Webhook
* `get(array $filter = [])`
  - Get a paginated list of webhooks
* `count(array $filter = [])`
  - Get the count of webhooks based on filter
* `find(int $id)`
  - Find a single webhook
* `all(array $filter = [])`
  - Get all the webhook based on filter
* `create(array $payload)`
  - Create a Shopify webhook
* `update(int $id, array $payload = [])`
  - Update a Shopify webhook
* `delete(int $id)`
  - Delete a Shopify webhook
    
##### Custom Collection
* `get(array $filter = [])`
  - Get a paginated list of custom collections
* `count(array $filter = [])`
  - Get the count of custom collections based on filter
* `find(int $id)`
  - Find a single custom collection
* `all(array $filter = [])`
  - Get all the shopify custom collections based on filter
* `create(array $payload = [])`
  - Create a Shopify custom collection
* `update(int $id, array $payload = [])`
  - Update a Shopify custom collection
* `delete(int $id)`
  - Delete a Shopify custom collection

##### Smart Collection
* `get(array $filter = [])`
  - Get a paginated list of smart collections
* `count(array $filter = [])`
  - Get the count of custom collections based on filter
* `find(int $id)`
  - Find a single smart collections
* `all(array $filter = [])`
  - Get all the shopify smart collections based on filter
* `create(array $payload = [])`
  - Create a Shopify smart collection
* `update(int $id, array $payload = [])`
  - Update a Shopify smart collection
* `delete(int $id)`
  - Delete a Shopify smart collection
    
##### Product Collection
* `get(int $collectionId, array $filter = [])`
  - Get a paginated list of product collections under a collection
* `all(int $referenceId, array $filter = [])`
  - Get all the products under a collections
    
##### Customer Address
* `get(int $customerId, array $filter = [])`
  - Get a paginated list of customer addresses
* `find(int $customerId, int $id)`
  - Find a single customer address
* `all(int $customerId, array $filter = [])`
  - Get all the shopify customer addresses
* `create(int $customerId, array $payload = [])`
  - Create a Shopify customer address
* `update(int $customerId, int $id, array $payload = [])`
  - Update a Shopify customer address
* `delete(int $customerId, int $id)`
  - Delete a Shopify customer address
* `setDefault(int $customerId, int $id)`
  - Sets the default address for a customer

##### Inventory Item
* `get(array $filter = [])`
  - Get a paginated list of inventory items
* `find(int $id)`
  - Find a single inventory items
* `all(array $filter = [])`
  - Get all the inventory items
* `update(int $id, array $payload = [])`
  - Update a Shopify inventory item

##### Inventory Level
* `get(array $filter)`
  - Get a paginated list of inventory levels
* `all(array $filter)`
  - Get all the inventory levels based on filter
* `delete(int $id)`
  - Delete a Shopify inventory level
* `adjust(array $payload = [])`
  - Adjust a Shopify inventory level
* `connect(array $payload = [])`
  - Connect a Shopify inventory level
* `set(array $payload = [])`
  - Set a Shopify inventory level

##### Location
* `get(array $filter = [])`
  - Get a paginated list of locations
* `count(array $filter = [])`
  - Get the counts of locations based on filter 
* `find(int $id)`
  - Find a single location
* `all(array $filter = [])`
  - Get all the locations based on filter
* `inventoryLevels(int $id)`
  - Get the inventory levels of locations
    
##### Price Rule Batch
* `create(int $priceRuleId, array $payload = [])`
  - Create a batch creation job for a price rule
* `find(int $priceRuleId, int $id)`
  - Find a single batch creation job for price rule
* `discountCodes(int $priceRuleId, int $id)`
  - Get the list of discount codes under batch
    
##### Discount Code
* `get(int $priceRuleId, array $filter = [])`
  - Get a paginated list of price rule discount codes based filter
* `count(int $priceRuleId, array $filter = [])`
  - Get the count of price rule discount codes based on filter
* `find(int $priceRuleId, int $id)`
  - Find a single Shopify discount code
* `all(int $priceRuleId, array $filter = [])`
  - Get all the Shopify discount code based filter
* `create(int $priceRuleId, array $payload = [])`
  - Create a Shopify discount code
* `update(int $priceRuleId, int $id, array $payload = [])`
  - Update a Shopify discount code
* `delete(int $priceRuleId, int $id)`
  - Delete a Shopify discount code
    
##### Product Image
* `get(int $productId, array $filter = [])`
  - Get a paginated list of product image
* `count(int $productId, array $filter = [])`
  - Get the count of product image based on filter
* `find(int $productId, int $id)`
  - Find a single product image
* `all(int $productId, array $filter = [])`
  - Get all the product image based on filter
* `create(int $productId, array $payload = [])`
  - Create a Shopify product image
* `update(int $productId, int $id, array $payload = [])`
  - Update a Shopify product image
* `delet(int $productId, int $id)`
  - Delete a Shopify product image
    
##### Product Variant
* `get(int $productId, array $filter = [])`
  - Get a paginated list of product variant
* `count(int $productId, array $filter = [])`
  - Get the count of product variant based on filter
* `find(int $productId, int $id)`
  - Find a single product variant
* `all(int $productId, array $filter = [])`
  - Get all the product variant based on filter
* `create(int $productId, array $payload = [])`
  - Create a Shopify product variant
* `update(int $productId, int $id, array $payload = [])`
  - Update a Shopify product variant
* `delet(int $productId, int $id)`
  - Delete a Shopify product variant

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

### Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email markc@mindarc.com.au instead of using the issue tracker.

### License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
