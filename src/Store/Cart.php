<?php

namespace MyLocAPI\Store;

use MyLocAPI\MyLocAPI;

class Cart
{

    private $MyLocAPI;

    public function __construct(MyLocAPI $MyLocAPI)
    {
        $this->MyLocAPI = $MyLocAPI;
    }

    /**
     * @param string $store myloc | webtropia | servdiscount or own Shop ID
     * @param array $items https://apidoc.myloc.de/#cart-item
     * @return array|string
     */
    public function createCart(string $store, string $currency, array $items){
        return $this->MyLocAPI->post('stores/'.$store.'/carts?currency='. $currency, [
            "items" => $items
        ]);
    }

    /**
     * @param string $store myloc | webtropia | servdiscount or own Shop ID
     * @return array|string
     */
    public function getCart(string $store, string $currency, string $access_key){
        return $this->MyLocAPI->get('stores/'.$store.'/carts?currency='. $currency. '&access_key=' . $access_key);
    }

    /**
     * @param string $store myloc | webtropia | servdiscount or own Shop ID
     * @return array|string
     */
    public function updateCart(string $store, string $currency, string $cart, string $access_key, array $items){
        return $this->MyLocAPI->put('stores/'.$store.'/carts/'.$cart.'?currency='. $currency. '&access_key=' . $access_key, [
            "items" => $items
        ]);
    }

    /**
     * @param string $store myloc | webtropia | servdiscount or own Shop ID
     * @return array|string
     */
    public function storeCartOrder(string $store, string $currency, string $cart, string $access_key){
        return $this->MyLocAPI->post('stores/'.$store.'/carts/'.$cart.'?currency='. $currency. '&access_key=' . $access_key);
    }

    /**
     * @param string $store myloc | webtropia | servdiscount or own Shop ID
     * @return array|string
     */
    public function storeCartItemsPrices(string $store, string $currency){
        return $this->MyLocAPI->post('stores/'.$store.'/carts/items/prices?currency='. $currency);
    }

}