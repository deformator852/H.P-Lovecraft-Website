<?php

spl_autoload_register(function ($class) {
	$parts = explode('\\', $class);
	$parts[0] = lcfirst($parts[0]);
	$file = __DIR__ . '/../' . implode('/', $parts) . '.php';
	if (file_exists($file)) {
		require $file;
	}
});


$webRoutes = require __DIR__ . '/../routes/web.php';
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUrlArguments = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

foreach ($webRoutes as $route) {
	if (mb_strtolower($requestMethod) !== $route->method) {
		continue;
	}

	if ($requestUri !== $route->url) {
		continue;
	}

	if (!$requestUrlArguments) {
		echo call_user_func([new $route->controller, $route->handler]);
	}
}