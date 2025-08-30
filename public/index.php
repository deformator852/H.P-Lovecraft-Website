<?php

use Library\Response\AbstractResponse;

spl_autoload_register(function ($class) {
	$parts = explode('\\', $class);
	$parts[0] = lcfirst($parts[0]);
	$file = __DIR__ . '/../' . implode('/', $parts) . '.php';
	if (file_exists($file)) {
		require $file;
	}
});

$webRoutes = require __DIR__ . '/../routes/web.php';
$requestUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestQueryParams = [];
parse_str(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY), $requestQueryParams);

foreach ($webRoutes as $route) {
	$instance = null;
	$router = new Router($requestUrl, $webRoutes);
	$routeUrl = $route->url;
	$routeQueryArguments = [];
	preg_match_all('/\{(\w+):(\w+)\}/', $routeUrl, $matches, PREG_SET_ORDER);
	foreach ($matches as $match) {
		$routeQueryArguments[$match[1]] = $match[2];
	}

	if (mb_strtolower($requestMethod) !== $route->method) {
		continue;
	}

	if (empty($requestUrlArguments) && empty($routeQueryArguments)) {
		if (!empty($instance)) {
			$instance = [$route->controller, $route->handler];
		}
	}
	if (!empty($requestQueryParams) && !empty($routeQueryArguments)) {
		echo "=== Request query parameters ===\n";
		var_dump($requestQueryParams);

		echo "=== Route expected query parameters ===\n";
		var_dump($routeQueryArguments);
	}

	if ($instance) {
		/**
		 * @var object $controller
		 * @var string $handler
		 * @var AbstractResponse $responseInstance
		 */
		$controller = new $instance[0];
		$handler = $instance[1];
		$responseInstance = $controller->handler();
		$responseInstance->send();
		break;
	}
}