<?php 

/*
 * © zeaL. All rights reserved.
 */


namespace zeaL\App\Containers;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use zeaL\App\Api\FilmApiDataCache;
use zeaL\App\Api\FilmApiDataMemcache;
use zeaL\App\Api\Load;
use zeaL\App\ServiceModels\Memcache;
use zeaL\App\ServiceModels\Redis;
use zeaL\App\Services\MemcacheService;
use zeaL\App\Services\RedisService;
use zeaL\App\Console\Schedule;
use zeaL\App\ServiceModels\Client;
use zeaL\App\Services\HttpService;

class ContainerModel {

    public function build() {
        $this->container = new ContainerBuilder();
        $this->container->set('Load', new Load(new Client, new RedisService, new Redis, new HttpService, new MemcacheService, new Memcache));
        $this->container->set('FilmApiDataMemcache', new FilmApiDataMemcache(new Load(new Client, new RedisService, new Redis, new HttpService, new MemcacheService, new Memcache), new MemcacheService, new Memcache));
        $this->container->set('FilmApiDataCache', new FilmApiDataCache(new Load(new Client, new RedisService, new Redis, new HttpService, new MemcacheService, new Memcache), new RedisService, new Redis));
        $this->container->set('Schedule', new Schedule(new $this, new RedisService, new Redis, new MemcacheService, new Memcache));
        $this->container->compile(true);
        return $this->container;
    }
}