<?php declare(strict_types=1);

namespace App\Infrastructure\Responders;

use App\Domain\Genre\Responses\CollectionResponse;;

abstract class JsonResponder
{
	abstract protected function json(array $data): CollectionResponse;
}
