<?php declare(strict_types=1);

namespace App\Infrastructure\Responders;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\{JsonResponse, Response};

final readonly class JsonResponder implements Responsable
{
    public function __construct(
        private AnonymousResourceCollection $data,
        private int $status = Response::HTTP_OK
    ) {}

    public function toResponse($request): JsonResponse
    {
        return new JsonResponse(
            data: $this->data,
            status: $this->status
        );
    }
}
