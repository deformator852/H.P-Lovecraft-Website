<?php

declare(strict_types=1);

namespace library\Enums;

enum Methods: string
{
	case GET = 'get';
	case POST = 'post';
	case PUT = 'put';
	case PATCH = 'patch';
	case DELETE = 'delete';
}
