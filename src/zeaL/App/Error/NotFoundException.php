<?php

/*
 * © zeaL. All rights reserved.
 */

 namespace zeaL\App\Error;

class NotFoundException extends \Exception {
	public function __construct(string $route, string $message = "", int $code = 0, \Throwable $previous = null) {
		parent::__construct('Route not found: ' . $route . '; ' .$message, $code, $previous);
	}
}
