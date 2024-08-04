<?php declare(strict_types=1);

namespace App\Domain\Genre\Directories\Web\Index;

use App\Infrastructure\Controllers\Controller;
use App\Infrastructure\Repositories\RepositoryInterface;
use Spatie\RouteAttributes\Attributes\Get;

final class IndexGenreAction extends Controller
{
    public function __construct(
        private readonly RepositoryInterface $repository,
        private readonly IndexGenreResponder $responder
    ) {}

    #[Get(uri: '/genres', name: 'genres.index')]
    public function __invoke(): \Illuminate\View\View
    {
        return $this->responder->respond(
            data: [
                'genres' => $this->repository->allGenre()
            ]
        );
    }
}