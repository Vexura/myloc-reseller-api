<?php

namespace MyLocAPI\Networking;

use MyLocAPI\MyLocAPI;

class Networking
{
    private $MyLocAPI;
    private $ipHandler;
    private $trafficHandler;

    public function __construct(MyLocAPI $MyLocAPI)
    {
        $this->MyLocAPI = $MyLocAPI;
    }

    /**
     * @return Ips
     */
    public function ips(): Ips
    {
        if(!$this->ipHandler) $this->ipHandler = new Ips($this->MyLocAPI);
        return $this->ipHandler;
    }

    /**
     * @return Traffic
     */
    public function traffic(): Traffic
    {
        if(!$this->trafficHandler) $this->trafficHandler = new Traffic($this->MyLocAPI);
        return $this->trafficHandler;
    }
}