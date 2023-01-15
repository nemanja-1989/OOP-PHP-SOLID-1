<?php 

/*
 * © zeaL. All rights reserved.
 */

 namespace zeaL\App\Services;

use zeaL\App\Interface\ServiceInterface;

class MemcacheService implements ServiceInterface{

    /**
     * @return \Memcached
     */
    public function getService() {
        $memcache = new \Memcached();
        $memcache->addServer(host: '127.0.0.1', port: 11211);
        return $memcache;
    }
}