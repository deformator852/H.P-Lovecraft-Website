<?php

declare(strict_types=1);

namespace Library\Route;

abstract class AbstractRoute
{
	protected(set) string $name;
	protected(set) string $controller;
	protected(set) string $method;
	protected(set) string $url;
	protected(set) string $handler;
}
