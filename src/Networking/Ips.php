<?php

namespace MyLocAPI\Networking;

use MyLocAPI\MyLocAPI;

class Ips
{
    private $MyLocAPI;

    public function __construct(MyLocAPI $MyLocAPI)
    {
        $this->MyLocAPI = $MyLocAPI;
    }

    /**
     * @param string $type v4 or v6
     * @return array|string
     */
    public function getAll(int $id, string $type = "v4")
    {
        return $this->MyLocAPI->get('ips/' . $type . '?contract='. $id);
    }

    /**
     * @return array|string
     */
    public function get(int $ip)
    {
        return $this->MyLocAPI->patch('ips/' . $ip);
    }

    /**
     * @return array|string
     */
    public function updateRouting(int $ip, int $target, string $routing_type)
    {
        return $this->MyLocAPI->put('ips/' . $ip, [
            "target" => $target,
            "routing_type" => $routing_type
        ]);
    }

    /**
     * @return array|string
     */
    public function setRNDS(int $ip, string $domain_name)
    {
        return $this->MyLocAPI->post('ips/' . $ip . '/rdns', [
            "domain_name" => $domain_name
        ]);
    }

    /**
     * @return array|string
     */
    public function deleteRNDS(int $ip)
    {
        return $this->MyLocAPI->delete('ips/' . $ip . '/rdns');
    }
}