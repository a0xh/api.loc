<?php declare(strict_types=1);

namespace App\Domain\Genre\Directories\Web\Delete;

use App\Infrastructure\Controllers\Controller;
use App\Domain\Genre\Handlers\DeleteGenreHandler;
use Illuminate\Http\RedirectResponse;
use Spatie\RouteAttributes\Attributes\{Delete, WhereUuid};
use App\Application\Models\Genre;

#[WhereUuid(param: 'id')]
final class DeleteGenreAction extends Controller
{
    public function __construct(
        private readonly DeleteGenreResponder $responder
    ) {}

    #[Delete(uri: '/genres/{id}/delete', name: 'genres.delete')]
    public function __invoke(
        string $id, DeleteGenreHandler $handler): RedirectResponse
    {
        $deleteGenre = $handler->handle(id: $id);

        return $this->responder->respond(result: $deleteGenre);
    }
}
