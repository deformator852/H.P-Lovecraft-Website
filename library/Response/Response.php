<?php

declare(strict_types=1);

namespace Library\Response;

class Response extends AbstractResponse
{
	public function __construct(
		public string $content = '',
		public int    $status = 200,
		public array  $headers = []
	)
	{
	}

	public function send(): void
	{
		http_response_code($this->status);
		foreach ($this->headers as $k => $v) {
			header("$k: $v");
		}
		echo $this->content;
	}
}
