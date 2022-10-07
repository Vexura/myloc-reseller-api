<?php

namespace MyLocAPI\Products\Server;

use MyLocAPI\MyLocAPI;

class Server
{
    private $MyLocAPI;
    private $dedicatedHandler;
    private $vpsHandler;

    public function __construct(MyLocAPI $MyLocAPI)
    {
        $this->MyLocAPI = $MyLocAPI;
    }

    /**
     * @return Dedicated
     */
    public function dedicated(): Dedicated
    {
        if(!$this->dedicatedHandler) $this->dedicatedHandler = new Dedicated($this->MyLocAPI);
        return $this->dedicatedHandler;
    }

    /**
     * @return VirtualPrivateServer
     */
    public function vps(): VirtualPrivateServer
    {
        if(!$this->vpsHandler) $this->vpsHandler = new VirtualPrivateServer($this->MyLocAPI);
        return $this->vpsHandler;
    }

}