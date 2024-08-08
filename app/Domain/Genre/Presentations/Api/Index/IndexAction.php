<?php declare(strict_types=1);

namespace App\Domain\Genre\Presentations\Api\Index;

use App\Infrastructure\Controllers\Controller;
use App\Infrastructure\Repositories\RepositoryInterface;
use App\Infrastructure\Responders\JsonResponder;
use Spatie\RouteAttributes\Attributes\Get;

final class IndexAction extends Controller
{
    public function __construct(
        private readonly RepositoryInterface $repository,
        private readonly IndexResponder $responder
    ) {}

    #[Get(uri: '/api/genres', name: 'api.genres.index')]
    public function __invoke(): JsonResponder
    {
        return $this->responder->respond(
            data: [
                'genres' => $this->repository->allGenre()
            ]
        );
    }
}
