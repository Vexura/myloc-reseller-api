<?php

namespace MyLocAPI\Store;

use MyLocAPI\MyLocAPI;

class Order
{
    private $MyLocAPI;

    public function __construct(MyLocAPI $MyLocAPI)
    {
        $this->MyLocAPI = $MyLocAPI;
    }

    /**
     * @return array|string
     */
    public function getOrder(string $order, string $secure_access_token){
        return $this->MyLocAPI->get('orders/'.$order.'?sat='. $secure_access_token);
    }

    /**
     * @return array|string
     */
    public function getPaymentMethods(string $order, string $secure_access_token){
        return $this->MyLocAPI->get('orders/'.$order.'/payment-methods?sat='. $secure_access_token);
    }

    /**
     * @return array|string
     */
    public function payOrder(string $order, string $payment_method, string $secure_access_token, string $redirect_url){
        return $this->MyLocAPI->post('orders/'.$order.'/pay/'.$payment_method.'?sat='. $secure_access_token, [
            "redirect_url" => $redirect_url
        ]);
    }
}