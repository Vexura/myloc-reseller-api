<?php

namespace MyLocAPI\Currency;

use MyLocAPI\MyLocAPI;

class Currency
{
    private $MyLocAPI;

    public function __construct(MyLocAPI $MyLocAPI)
    {
        $this->MyLocAPI = $MyLocAPI;
    }

    /**
     * @return array|string
     */
    public function get()
    {
        return $this->MyLocAPI->get('currency/exchange-rates');
    }

}