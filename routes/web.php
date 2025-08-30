<?php

use Library\Route\AbstractRoute;
use Library\Route\Route;
use Src\Controllers\Client\BookController;

/**
 * @return array<int,AbstractRoute>
 *
 */

return [
	Route::get(HomeController::class, 'index', '/', 'home'),
	Route::get(BookController::class, 'index', '/book', 'book'),
	Route::get(BookController::class, 'show', '/book/{id:int}', 'book.detail'),
];