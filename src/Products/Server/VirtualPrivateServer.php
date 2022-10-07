<?php

namespace MyLocAPI\Products\Server;

use MyLocAPI\MyLocAPI;

class VirtualPrivateServer
{

    private $MyLocAPI;

    public function __construct(MyLocAPI $MyLocAPI)
    {
        $this->MyLocAPI = $MyLocAPI;
    }

    /**
     * @return array|string
     */
    public function getAll()
    {
        return $this->MyLocAPI->get('vps');
    }

    /**
     * @return array|string
     */
    public function get(int $id)
    {
        return $this->MyLocAPI->get('vps/' . $id);
    }

    /**
     * @return array|string
     */
    public function getIPs(int $id)
    {
        return $this->MyLocAPI->get('vps/' . $id . '/ips');
    }

    /**
     * @return array|string
     */
    public function orderIP(int $id)
    {
        return $this->MyLocAPI->post('vps/' . $id . '/ips');
    }

    /**
     * @return array|string
     */
    public function getOS(int $id)
    {
        return $this->MyLocAPI->post('vps/' . $id . '/software');
    }

    /**
     * @return array|string
     */
    public function getSoftware(int $id)
    {
        return $this->MyLocAPI->get('vps/'. $id . '/available_software');
    }

    /**
     * @return array|string
     */
    public function installSoftware(int $id, int $software, int $raid_level)
    {
        return $this->MyLocAPI->post('vps/'. $id . '/install', [
            "software" => $software,
            "software_raid_level" => $raid_level
        ]);
    }

    /**
     * @return array|string
     */
    public function restart(int $id, string $datetime)
    {
        return $this->MyLocAPI->post('vps/'. $id . '/restart', [
            "possible_next_reboot" => $datetime,
        ]);
    }

    /**
     * @return array|string
     */
    public function suspend(int $id)
    {
        return $this->MyLocAPI->post('vps/'. $id . '/suspend');
    }

    /**
     * @return array|string
     */
    public function unsuspend(int $id)
    {
        return $this->MyLocAPI->post('vps/'. $id . '/unsuspend');
    }

    /**
     * @param int $id
     * @param string $opt OnTimePassword
     * @return array|string
     */
    public function getRootPassword(int $id, string $opt)
    {
        return $this->MyLocAPI->get('vps/'. $id . '/retrieve-password?opt=' . $opt);
    }

    /**
     * @return array|string
     */
    public function getRaidSets(int $id)
    {
        return $this->MyLocAPI->get('vps/'. $id . '/raidsets');
    }

    /**
     * @param string $state active, planned or deactivated
     * @return array|string
     */
    public function getRaidSetsState(int $id, string $state)
    {
        return $this->MyLocAPI->get('vps/'. $id . '/raidsets/' . $state);
    }

    /**
     * @return array|string
     */
    public function setRaidSets(int $id, array $raidsets, bool $force, string $os)
    {
        return $this->MyLocAPI->post('vps/'. $id . '/raidsets', [
            "raidsets" => $raidsets,
            "force" => $force,
            "operating_system" => $os
        ]);
    }

    /**
     * @return array|string
     */
    public function deleteRaidSet(int $id, int $raidset)
    {
        return $this->MyLocAPI->delete('vps/'. $id . '/raidsets/' . $raidset);
    }

    /**
     * @return array|string
     */
    public function deleteRaidSets(int $id)
    {
        return $this->MyLocAPI->delete('vps/'. $id . '/raidsets');
    }

}