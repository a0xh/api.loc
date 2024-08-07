<?php declare(strict_types=1);

namespace App\Domain\Genre\Presentations\Api\Index;

use App\Domain\Genre\Resources\IndexResource;
use App\Domain\Genre\Responses\CollectionResponse;
use App\Infrastructure\Responders\JsonResponder;

final class IndexResponder extends JsonResponder
{
    public function json(?array $data): CollectionResponse
    {
        return new CollectionResponse(
            data: IndexResource::collection(
                resource: $data
            )
        );
    }
}
