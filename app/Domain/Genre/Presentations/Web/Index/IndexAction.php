<?php declare(strict_types=1);

namespace App\Domain\Genre\Presentations\Web\Index;

use App\Infrastructure\Controllers\Controller;
use App\Infrastructure\Repositories\RepositoryInterface;
use Spatie\RouteAttributes\Attributes\Get;

final class IndexAction extends Controller
{
    public function __construct(
        private readonly RepositoryInterface $repository,
        private readonly IndexResponder $responder
    ) {}

    #[Get(uri: '/genres', name: 'genres.index')]
    public function __invoke(): \Illuminate\View\View
    {
        return $this->responder->render(
            data: [
                'genres' => $this->repository->allGenre()
            ]
        );
    }
}