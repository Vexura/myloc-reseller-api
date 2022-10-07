<?php


namespace MyLocAPI\Accounting;

use MyLocAPI\MyLocAPI;

class Token
{
    private $MyLocAPI;

    public function __construct(MyLocAPI $MyLocAPI)
    {
        $this->MyLocAPI = $MyLocAPI;
    }

    /**
     * @return array|string
     */
    public function getTokens()
    {
        return $this->MyLocAPI->get('token');
    }

    /**
     * @return array|string
     */
    public function getPermissions()
    {
        return $this->MyLocAPI->get('token/scopes');
    }

    /**
     * @return array|string
     */
    public function getCurrentPermissions()
    {
        return $this->MyLocAPI->get('token/me');
    }

    /**
     * @return array|string
     */
    public function createToken(string $user, string $expire_date, array $permissions)
    {
        return $this->MyLocAPI->post('token', [
            "user" => $user,
            "expire_date" => $expire_date,
            "scope" => $permissions
        ]);
    }

}