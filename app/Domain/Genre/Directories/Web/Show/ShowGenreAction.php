<?php declare(strict_types=1);

namespace App\Domain\Genre\Directories\Web\Show;

use App\Infrastructure\Controllers\Controller;
use App\Infrastructure\Repositories\RepositoryInterface;
use Spatie\RouteAttributes\Attributes\{Get, WhereUuid};

#[WhereUuid(param: 'id')]
final class ShowGenreAction extends Controller
{
    public function __construct(
        private readonly RepositoryInterface $repository,
        private readonly ShowGenreResponder $responder
    ) {}

    #[Get(uri: '/genres/{id}/show', name: 'genres.show')]
    public function __invoke(string $id): \Illuminate\View\View
    {
        return $this->responder->respond(
            data: [
                'genre' => $this->repository->findGenre(
                    id: $id
                )
            ]
        );
    }
}
