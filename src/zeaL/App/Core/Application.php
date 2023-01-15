<?php

/*
 * © zeaL. All rights reserved.
 */

namespace zeaL\App\Core;

use Psr\Log\LoggerInterface;

abstract class Application {

    /**
     * @param LoggerInterface $logger
     */
	public function __construct(protected LoggerInterface $logger) {
		$this->logger = $logger;
	}

}
