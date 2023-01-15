<?php

/*
 * © zeaL. All rights reserved.
 */

namespace zeaL\App\Controllers;

use zeaL\App\Api\FilmApiDataLoader;

class Homepage extends BaseController {

    /**
     * @param FilmApiDataLoader $loader
     */
	public function __construct(protected FilmApiDataLoader $loader) {
		$this->loader = $loader;
	}

    /**
     * @return false|string
     * @throws \zeaL\App\Error\TemplatePathNotFoundException
     * @throws \zeaL\App\Error\TemplatePathNotReadableException
     */
	public function __invoke(): string|false {
		return $this->render('index.phtml', [
			'items' => $this->loader->getResponse(),
		]);
	}
}
