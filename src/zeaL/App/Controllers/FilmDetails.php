<?php

/*
 * © zeaL. All rights reserved.
 */

namespace zeaL\App\Controllers;

use zeaL\App\Api\FilmApiDataLoader;

class FilmDetails extends BaseController {

    /**
     * @param FilmApiDataLoader $loader
     */
	public function __construct(protected FilmApiDataLoader $loader) {
		$this->loader = $loader;
	}

    /**
     * @param int $id
     * @return false|string
     * @throws \zeaL\App\Error\TemplatePathNotFoundException
     * @throws \zeaL\App\Error\TemplatePathNotReadableException
     */
	public function __invoke(int $id) : string|false {
		return $this->render('show.phtml', [
			'items' => $this->loader->getById(id: $id),
		]);
	}
}
