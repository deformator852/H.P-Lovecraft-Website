<?php

declare(strict_types=1);

use Library\Route\AbstractRoute;

abstract class AbstractRouter
{
	protected(set) string $requestUrl;
	protected(set) array $routes;

	abstract public function matchRoute(AbstractRoute $route): array|bool;

	public function matchMethod(AbstractRoute $route): bool
	{
	}

	public function matchUrl(AbstractRoute $route): bool
	{
	}

	public function matchArguments(AbstractRoute $route): array|bool
	{
	}

	public function parseRouteUrlQueryArguments(string $url): array
	{
	}

	public function parseRouteUrlParamsArguments(string $url): array
	{
	}

	public function parseRequestUrlQueryArguments(string $url): array
	{
	}

	public function parseRequestUrlQueryParams(string $url): array
	{
	}

	public function getRequestUrl(): string
	{
		return $this->requestUrl;
	}

	public function getRoutes(): array
	{
		return $this->routes;
	}

}
