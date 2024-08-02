<?php declare(strict_types=1);

namespace App\Domain\Genre\Architecture\Web\Update;

use App\Infrastructure\Controllers\Controller;
use App\Domain\Genre\Handlers\UpdateGenreHandler;
use Spatie\RouteAttributes\Attributes\{Put, WhereUuid};
use Illuminate\Http\RedirectResponse;
use App\Domain\Genre\Requests\GenreRequest;
use App\Application\Models\Genre;

#[WhereUuid('id')]
final class UpdateGenreAction extends Controller
{
    public function __construct(
        private readonly UpdateGenreResponder $responder
    ) {}

    #[Put('/admin/genres/{id}/update', name: "admin.genres.update")]
    public function __invoke(
        string $id, GenreRequest $request, UpdateGenreHandler $handler
    ): RedirectResponse
    {
        return $this->responder->handle(
            result: $handler->handle(id: $id, dto: $request->toDto())
        )
    }
}
