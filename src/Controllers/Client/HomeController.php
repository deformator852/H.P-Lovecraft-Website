<?php

declare(strict_types=1);

use Library\Controller\AbstractController;
use Library\Response\Response;
use Library\View\View;

class HomeController extends AbstractController
{
	public function index(): Response
	{
		return View::render('/pages/home.php');
	}
}