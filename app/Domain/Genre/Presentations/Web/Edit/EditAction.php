<?php declare(strict_types=1);

namespace App\Domain\Genre\Presentations\Web\Edit;

use App\Infrastructure\Controllers\Controller;
use App\Infrastructure\Repositories\RepositoryInterface;
use Spatie\RouteAttributes\Attributes\{Get, WhereUuid};

#[WhereUuid(param: 'id')]
final class EditAction extends Controller
{
    public function __construct(
        private readonly RepositoryInterface $repository,
        private readonly EditResponder $responder
    ) {}

    #[Get(uri: '/genres/{id}/edit', name: 'genres.edit')]
    public function __invoke(string $id): \Illuminate\View\View
    {
        return $this->responder->render(
            data: [
                'genre' => $this->repository->findGenre(
                    id: $id
                )
            ]
        );
    }
}
