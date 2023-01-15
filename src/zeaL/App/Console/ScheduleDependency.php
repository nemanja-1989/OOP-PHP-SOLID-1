<?php

/*
 * © zeaL. All rights reserved.
 */

 namespace zeaL\App\Console;

use zeaL\App\Api\FilmApiDataCache;
use zeaL\App\Api\FilmApiDataMemcache;
use zeaL\App\Containers\ContainerModel;

class ScheduleDependency
{
    public function __construct(protected ContainerModel $container) {
        $this->container = $container;
    }
    /**
     * @return FilmApiDataCache[]
     */
    private function dependencyClassesForScheduleRedis(): array
    {
        // $container = new ContainerModel();
        return [
            $this->container->build()->get('FilmApiDataCache'),
        ];
    }

    /**
     * @return FilmApiDataMemcache[]
     */
    private function dependencyClassesForScheduleMemcache(): array
    {
        // $container = new ContainerModel();
        return [
            $this->container->build()->get('FilmApiDataMemcache'),
        ];
    }

    public function redisClasses(): array {
        return $this->dependencyClassesForScheduleRedis();
    }

    public function memcacheClasses(): array {
        return $this->dependencyClassesForScheduleMemcache();
    }

}