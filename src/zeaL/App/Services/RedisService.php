<?php 

/*
 * © zeaL. All rights reserved.
 */

 namespace zeaL\App\Services;

use zeaL\App\Interface\ServiceInterface;
use Predis\Client;

class RedisService implements ServiceInterface{

    /**
     * @return Client
     */
    public function getService() :Client {
        return new \Predis\Client();
    }
}