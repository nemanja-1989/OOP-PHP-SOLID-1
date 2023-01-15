<?php

/*
 * © zeaL. All rights reserved.
 */

namespace zeaL\App\Controllers;


class RedirectToVersion extends BaseController {

    /**
     * @return void
     */
	public function __invoke() {
		\header('Location: /v1/');
	}
}
