<?php declare(strict_types=1);

namespace App\Domain\Genre\Presentations\Web\Show;

use App\Infrastructure\Controllers\Controller;
use App\Infrastructure\Repositories\RepositoryInterface;
use Spatie\RouteAttributes\Attributes\{Get, WhereUuid};
use App\Infrastructure\Responders\ViewResponder;

#[WhereUuid(param: 'id')]
final class ShowAction extends Controller
{
    public function __construct(
        private readonly RepositoryInterface $repository,
        private readonly ShowResponder $responder
    ) {}

    #[Get(uri: '/genres/{id}/show', name: 'genres.show')]
    public function __invoke(string $id): ViewResponder
    {
        return $this->responder->handle(
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
