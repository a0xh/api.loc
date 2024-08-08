<?php declare(strict_types=1);

namespace App\Domain\Genre\Presentations\Web\Index;

use App\Infrastructure\Controllers\Controller;
use App\Infrastructure\Repositories\RepositoryInterface;
use Spatie\RouteAttributes\Attributes\Get;
use App\Infrastructure\Responders\ViewResponder;
use Illuminate\Support\Facades\Gate;

final class IndexAction extends Controller
{
    public function __construct(
        private readonly RepositoryInterface $repository,
        private readonly IndexResponder $responder,
        private readonly Gate $access
    ) {}

    #[Get(uri: '/genres', name: 'genres.index')]
    public function __invoke(): ViewResponder
    {
        dd($this->access->allows('delete'));
        return $this->responder->respond(
            view: 'genres.index',
            data: [
                'genres' => $this->repository->allGenre()
            ],
            mergeData: null
        );
    }
}