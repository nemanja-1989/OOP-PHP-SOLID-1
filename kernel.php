<?php

/*
 * © zeaL. All rights reserved.
 */

require_once dirname(__DIR__) . '/example/vendor/autoload.php';
use zeaL\App\Containers\ContainerModel;

$container = new ContainerModel();
$schedule = $container->build()->get('Schedule');
$schedule->exe();