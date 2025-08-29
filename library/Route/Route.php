<?php

declare(strict_types=1);

namespace Library\Route;

use library\Enums\Methods;

class Route extends AbstractRoute
{
	protected(set) string $name, $controller, $method, $url, $handler;

	protected function __construct(string $controller, $method, $handler, $url, $name)
	{
		$this->controller = $controller;
		$this->method = $method;
		$this->url = $url;
		$this->handler = $handler;
		$this->name = $name;
	}

	public static function get(string $controller, $handler, $url, $name): AbstractRoute
	{
		return new static($controller, Methods::GET->value, $handler, $url, $name);
	}

	public static function post(string $controller, $handler, $url, $name): AbstractRoute
	{
		return new static($controller, Methods::POST->value, $handler, $url, $name);
	}

	public static function put(string $controller, $handler, $url, $name): AbstractRoute
	{
		return new static($controller, Methods::PUT->value, $handler, $url, $name);
	}

	public static function patch(string $controller, $handler, $url, $name): AbstractRoute
	{
		return new static($controller, Methods::PATCH->value, $handler, $url, $name);
	}

	public static function delete(string $controller, $handler, $url, $name): AbstractRoute
	{
		return new static($controller, Methods::DELETE->value, $handler, $url, $name);
	}
}