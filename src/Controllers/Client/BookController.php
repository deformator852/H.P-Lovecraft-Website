<?php

declare(strict_types=1);

namespace Src\Controllers\Client;

use Library\Response\Response;
use Library\View\View;

class BookController
{
	public function index(): string
	{
		return 'sda';
	}

	public function show(): Response
	{
		return View::render('/pages/show-book.php');
	}
}