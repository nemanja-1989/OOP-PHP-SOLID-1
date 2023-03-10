<?php

/*
 * © zeaL. All rights reserved.
 */

namespace zeaL\App\Console;

use zeaL\App\Constants\Items\ItemsConstants;
use zeaL\App\Containers\ContainerModel;
use zeaL\App\Interface\MemcacheDependency;
use zeaL\App\Interface\RedisDependency;
use zeaL\App\ServiceModels\Memcache;
use zeaL\App\ServiceModels\Redis;
use zeaL\App\Services\MemcacheService;
use zeaL\App\Services\RedisService;

final class Schedule extends ScheduleDependency
{

    /**
     * @param ContainerModel $container;
     * @param RedisService $redisService
     * @param Redis $redis
     * @param MemcacheService $memcacheService
     * @param Memcache $memcache
     */
    public function __construct
    (
        protected ContainerModel $container,
        protected RedisService $redisService,
        protected Redis $redis,
        protected MemcacheService $memcacheService,
        protected Memcache $memcache,
    )
    {
        $this->container = $container;
        $this->redisService = $redisService;
        $this->redis = $redis;
        $this->memcacheService = $memcacheService;
        $this->memcache = $memcache;
    }
    /**
     * @param RedisDependency $redisDependency
     * @return void
     */
    private function runRedis(RedisDependency $redisDependency) :void
    {
        $redisDependency->redisDependencyClassesMethodsForCaching();
    }

    /**
     * @param MemcacheDependency $memcacheDependency
     * @return void
     */
    private function runMemcache(MemcacheDependency $memcacheDependency) :void
    {
        $memcacheDependency->memcacheDependencyClassesMethodsForCaching();
    }

    /**
     * @return void
     */
    public function exe() :void
    {
        //without checking cache keys
        foreach ($this->redisClasses() as $class) {
            $this->runRedis($class);
        }
        foreach ($this->memcacheClasses() as $class) {
            $this->runMemcache($class);
        }
        //if cache exists
        // if($this->checkMemcache() === false || $this->checkRedisCache() === false) {
        //     foreach ($this->redisClasses() as $class) {
        //         $this->runRedis($class);
        //     }
        //     if($this->checkRedisCache() === false) {
        //         foreach ($this->memcacheClasses() as $class) {
        //             $this->runMemcache($class);
        //         }
        //     }
        // }
    }

    private function checkRedisCache() :bool {
        if($this->redis->getCache($this->redisService,  name: ItemsConstants::ITEMS_CACHE) === null) {
            return true;
        }
        return false;
    }

    private function checkMemcache() :bool {
        if($this->memcache->getCache($this->memcacheService, name: ItemsConstants::ITEMS_CACHE) === null) {
            return true;
        }
        return false;
    }
}