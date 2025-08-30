<?php

declare(strict_types=1);

namespace Library\Response;

abstract class AbstractResponse
{
	public string $content = '';
	public int $status;
	public array $headers = [];

	abstract public function send();
}