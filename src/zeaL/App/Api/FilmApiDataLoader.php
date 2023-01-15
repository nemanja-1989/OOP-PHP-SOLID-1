<?php

/*
 * © zeaL. All rights reserved.
 */

namespace zeaL\App\Api;

use Doctrine\Common\Collections\ArrayCollection;
use zeaL\App\Containers\ContainerModel;
use zeaL\App\Interface\ResponseInterface;
use zeaL\App\Interface\ResponseSingleInterface;

class FilmApiDataLoader implements ResponseInterface, ResponseSingleInterface
{

    public function __construct(protected ContainerModel $container) {
        $this->container = $container;
    }
    /**
     * @return Load
     */
    private function getLoadClass(): Load
    {
        return $this->container->build()->get('Load');
    }

    /**
     * @return ArrayCollection|string
     */
    public function getResponse(): ArrayCollection|string
    {
        return $this->getLoadClass()->loadData();
    }

    /**
     * @param $id
     * @return ArrayCollection|string
     */
    public function getById($id): ArrayCollection|string
    {
        return $this->getLoadClass()->loadItemData($id);
    }
}
