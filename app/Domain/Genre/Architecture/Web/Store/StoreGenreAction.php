<?php declare(strict_types=1);

namespace App\Domain\Genre\Architecture\Web\Store;

use App\Infrastructure\Controllers\Controller;
use App\Domain\Genre\Handlers\CreateGenreHandler;
use Spatie\RouteAttributes\Attributes\Post;
use App\Domain\Genre\Requests\GenreRequest;
use Illuminate\Http\RedirectResponse;

final class StoreGenreAction extends Controller
{
    public function __construct(
        private readonly StoreGenreResponder $responder
    ) {}

    #[Post('/genres/store', name: "genres.store")]
    public function __invoke(
        GenreRequest $request, CreateGenreHandler $handler
    ): RedirectResponse
    {
        return $this->responder->respond(
            result: $handler->handle(dto: $request->toDto())
        );
    }
}
