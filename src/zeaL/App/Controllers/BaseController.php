<?php

/*
 * © zeaL. All rights reserved.
 */

namespace zeaL\App\Controllers;

use zeaL\App\Error\TemplatePathNotFoundException;
use zeaL\App\Error\TemplatePathNotReadableException;
use zeaL\App\Template\Template;

abstract class BaseController {

	protected CONST TEMPLATE_PATH = __DIR__ . '/../../../../template';

    /**
     * @param string $content
     * @param string $title
     * @return false|string
     */
	protected function renderBody(string $content, string $title): string|false {
		$templatePath = self::TEMPLATE_PATH . DIRECTORY_SEPARATOR . '_body.phtml';
		return (new Template($templatePath, ['content' => $content, 'title' => $title]))->render();
	}

    /**
     * @param string $path
     * @param array $data
     * @return false|string
     * @throws TemplatePathNotFoundException
     * @throws TemplatePathNotReadableException
     */
	protected function render(string $path, array $data = []): string|false {
		$templatePath = self::TEMPLATE_PATH . DIRECTORY_SEPARATOR . $path;

		if (!is_file($templatePath)) {
			throw new TemplatePathNotFoundException($templatePath);
		}

		if (!\is_readable($templatePath)) {
			throw new TemplatePathNotReadableException($templatePath);
		}
		
		return $this->renderBody((new Template($templatePath, $data))->render(), title: $data['items']['title'] ?? "Movies");
	}

}
