<?php

declare(strict_types=1);

use Library\Route\AbstractRoute;

class Router extends AbstractRouter
{
	public function __construct(string $requestUrl, array $routes)
	{
		$this->requestUrl = $requestUrl;
		$this->routes = $routes;
	}

	public function matchRoute(AbstractRoute $route): array|bool
	{
	}
}