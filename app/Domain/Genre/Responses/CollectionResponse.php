<?php declare(strict_types=1);

namespace App\Domain\Genre\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

final class CollectionResponse implements Responsable
{
    public function __construct(
        private readonly AnonymousResourceCollection $data,
        private readonly int $status = Response::HTTP_OK
    ) {}

    public function toResponse($request): JsonResponse
    {
        return new JsonResponse(
            data: $this->data, 
            status: $this->status
        );
    }
}
