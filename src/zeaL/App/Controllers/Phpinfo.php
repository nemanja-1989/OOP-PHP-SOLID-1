<?php

/*
 * © zeaL. All rights reserved.
 */

namespace zeaL\App\Controllers;

class Phpinfo extends BaseController {

    /**
     * @return false|string
     * @throws \zeaL\App\Error\TemplatePathNotFoundException
     * @throws \zeaL\App\Error\TemplatePathNotReadableException
     */
	public function __invoke(): string|false {
		return $this->render('phpinfo.phtml', []);
	}
}
