<?php


namespace MyLocAPI\Accounting;

use MyLocAPI\MyLocAPI;

class Users
{
    private $MyLocAPI;

    public function __construct(MyLocAPI $MyLocAPI)
    {
        $this->MyLocAPI = $MyLocAPI;
    }

    /**
     * @return array|string
     */
    public function getSubusers()
    {
        return $this->MyLocAPI->get('users/subusers');
    }

    /**
     * @return array|string
     */
    public function getSubuser(string $userHandle)
    {
        return $this->MyLocAPI->get('users/subusers/' . $userHandle);
    }

    /**
     * @return array|string
     */
    public function getSubuserProducts(string $userHandle)
    {
        return $this->MyLocAPI->get('users/subusers/' . $userHandle . '/contracts');
    }
}