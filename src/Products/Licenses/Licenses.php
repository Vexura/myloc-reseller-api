<?php

namespace MyLocAPI\Products\Licenses;

use MyLocAPI\MyLocAPI;

class Licenses
{
    private $MyLocAPI;

    public function __construct(MyLocAPI $MyLocAPI)
    {
        $this->MyLocAPI = $MyLocAPI;
    }

    /**
     * @return array|string
     */
    public function get(int $id)
    {
        return $this->MyLocAPI->get('licenses/' . $id);
    }

    /**
     * @return array|string
     */
    public function updateIP(int $id, string $ip)
    {
        return $this->MyLocAPI->patch('licenses/' . $id . '/ip', [
            "ip_address" => $ip
        ]);
    }

    /**
     * @return array|string
     */
    public function updateDescription(int $id, string $desc)
    {
        return $this->MyLocAPI->patch('licenses/' . $id . '/ip', [
            "description" => $desc
        ]);
    }
}