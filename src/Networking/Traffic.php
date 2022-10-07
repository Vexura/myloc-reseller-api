<?php

namespace MyLocAPI\Networking;

use MyLocAPI\MyLocAPI;

class Traffic
{
    private $MyLocAPI;

    public function __construct(MyLocAPI $MyLocAPI)
    {
        $this->MyLocAPI = $MyLocAPI;
    }

    /**
     * @return array|string
     */
    public function get(int $id, string $start_date, string $end_date)
    {
        return $this->MyLocAPI->get('traffic/' . $id . '?start_date='. $start_date .'&end_date=' . $end_date);
    }

}