<?php declare(strict_types=1);

namespace App\Domain\Genre\Presentations\Api\Index;

use App\Domain\Genre\Resources\AllResource;
use App\Infrastructure\Responders\JsonResponder;

final readonly class IndexResponder
{
    public function respond(array $data): JsonResponder
    {
        return new JsonResponder(
            data: AllResource::collection(
                resource: $data
            )
        );
    }
}
