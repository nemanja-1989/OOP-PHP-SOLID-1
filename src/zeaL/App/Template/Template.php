<?php

/*
 * © zeaL. All rights reserved.
 */

namespace zeaL\App\Template;

class Template {

	protected $templatePath;
	protected $vars;

	public function __construct(string $templatePath, array $vars = []) {
		$this->templatePath = $templatePath;
		$this->vars = $vars;
	}


	public function __get($name) {
		if (!array_key_exists($name, $this->vars)) {
			throw new \Exception('Template doesn\'t have variable: ' . $name);
		}

		return $this->vars[$name];
	}

	public function render() {
		ob_start();
		include $this->templatePath;
		return ob_get_clean();
	}
}
