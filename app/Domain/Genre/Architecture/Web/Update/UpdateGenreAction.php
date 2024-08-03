<?php declare(strict_types=1);

namespace App\Domain\Genre\Architecture\Web\Update;

use App\Infrastructure\Controllers\Controller;
use Spatie\RouteAttributes\Attributes\{Put, WhereUuid};
use App\Domain\Genre\Handlers\UpdateGenreHandler;
use Illuminate\Http\RedirectResponse;
use App\Domain\Genre\Requests\GenreRequest;

#[WhereUuid(param: 'id')]
final class UpdateGenreAction extends Controller
{
    public function __construct(
        private readonly UpdateGenreResponder $responder
    ) {}

    #[Put(uri: '/genres/{id}/update', name: 'genres.update')]
    public function __invoke(
        string $id, GenreRequest $request, UpdateGenreHandler $handler
    ): RedirectResponse
    {
        return $this->responder->respond(result: $handler->handle(
            id: $id, dto: $request->toDto()
        ));
    }
}
