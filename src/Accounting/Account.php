<?php


namespace MyLocAPI\Accounting;

use MyLocAPI\MyLocAPI;

class Account
{
    private $MyLocAPI;
    private $tokenHandler;
    private $usersHandler;

    public function __construct(MyLocAPI $MyLocAPI)
    {
        $this->MyLocAPI = $MyLocAPI;
    }

    /**
     * @return Token
     */
    public function token(): Token
    {
        if(!$this->tokenHandler) $this->tokenHandler = new Token($this->MyLocAPI);
        return $this->tokenHandler;
    }

    /**
     * @return Users
     */
    public function users(): Users
    {
        if(!$this->usersHandler) $this->usersHandler = new Users($this->MyLocAPI);
        return $this->usersHandler;
    }

}