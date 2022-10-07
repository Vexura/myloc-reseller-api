<?php

namespace MyLocAPI\WHMCS;

use MyLocAPI\MyLocAPI;

class WHMCS
{
    private $MyLocAPI;

    public function __construct(MyLocAPI $MyLocAPI)
    {
        $this->MyLocAPI = $MyLocAPI;
    }

    /**
     * @param string $min_stability beta | stable
     * @return array|string
     */
    public function getLatest(string $min_stability){
        return $this->MyLocAPI->get('/whmcs/latest-version/' . $min_stability);
    }

}