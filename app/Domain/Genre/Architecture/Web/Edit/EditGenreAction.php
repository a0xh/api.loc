<?php declare(strict_types=1);

namespace App\Domain\Genre\Architecture\Web\Edit;

use App\Infrastructure\Controllers\Controller;
use App\Domain\Genre\Repositories\GenreRepositoryInterface;
use Spatie\RouteAttributes\Attributes\{Get, WhereUuid};
use App\Application\Models\Genre;

#[WhereUuid('id')]
final class EditGenreAction extends Controller
{
    public function __construct(
        private readonly GenreRepositoryInterface $repository,
        private readonly EditGenreResponder $responder
    ) {}

    #[Get('/genres/{id}/edit', name: 'genres.edit')]
    public function __invoke(string $id): \Illuminate\View\View
    {
        return $this->responder->handle([
            'genre' => $this->repository->find(id: $id)
        ]);
    }
}
