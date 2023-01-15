<?php

/*
 * © zeaL. All rights reserved.
 */

namespace zeaL\App\Core;

class FilmApiHttpApplication extends HttpApplication {

    /**
     * @return mixed|void
     * @throws \zeaL\App\Error\MethodNotAllowedException
     * @throws \zeaL\App\Error\NotFoundException
     */
	public function run() {
		$content = parent::run();
		\header('Content-Encoding: utf-8');
		\header('X-Data: films');
		\header('Content-Length: '.\strlen($content));
		\header('Cache-Control: max-age=3600, must-revalidate');
		\header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + 3600));

		echo $content;
	}
}
