<?php

namespace MyLocAPI\Store;

use MyLocAPI\MyLocAPI;

class Store
{
    private $MyLocAPI;
    private $cartHandler;
    private $productsHandler;
    private $orderHandler;

    public function __construct(MyLocAPI $MyLocAPI)
    {
        $this->MyLocAPI = $MyLocAPI;
    }

    /**
     * @return Cart
     */
    public function cart(): Cart
    {
        if(!$this->cartHandler) $this->cartHandler = new Cart($this->MyLocAPI);
        return $this->cartHandler;
    }

    /**
     * @return Order
     */
    public function order(): Order
    {
        if(!$this->orderHandler) $this->orderHandler = new Order($this->MyLocAPI);
        return $this->orderHandler;
    }

    /**
     * @return Products
     */
    public function products(): Products
    {
        if(!$this->productsHandler) $this->productsHandler = new Products($this->MyLocAPI);
        return $this->productsHandler;
    }

}