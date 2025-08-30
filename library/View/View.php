<?php

declare(strict_types=1);

namespace Library\View;

use Library\Response\Response;

class View extends AbstractView
{
	public static function render(string $path, array $context = []): Response
	{
		$root = dirname(__DIR__, 2);
		$viewPath = $root . '/web/views' . $path;
		extract($context, EXTR_SKIP);
		ob_start();
		include_once $viewPath;
		$html = ob_get_clean();
		return new Response($html);
	}
}