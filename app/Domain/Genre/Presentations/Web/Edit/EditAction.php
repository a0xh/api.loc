<?php declare(strict_types=1);

namespace App\Domain\Genre\Presentations\Web\Edit;

use App\Infrastructure\Controllers\Controller;
use App\Infrastructure\Repositories\RepositoryInterface;
use Spatie\RouteAttributes\Attributes\{Get, WhereUuid};
use App\Infrastructure\Responders\ViewResponder;

#[WhereUuid(param: 'id')]
final class EditAction extends Controller
{
    public function __construct(
        private readonly RepositoryInterface $repository,
        private readonly EditResponder $responder
    ) {}

    #[Get(uri: '/genres/{id}/edit', name: 'genres.edit')]
    public function __invoke(string $id): ViewResponder
    {
        return $this->responder->respond(
            view: 'genres.edit',
            data: [
                'genre' => $this->repository->findGenre(
                    id: $id
                )
            ],
            mergeData: null
        );
    }
}
