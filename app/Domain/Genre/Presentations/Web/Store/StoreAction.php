<?php declare(strict_types=1);

namespace App\Domain\Genre\Presentations\Web\Store;

use App\Infrastructure\Controllers\Controller;
use Spatie\RouteAttributes\Attributes\Post;
use App\Domain\Genre\Requests\StoreRequest;
use App\Domain\Genre\Handlers\StoreHandler;
use Illuminate\Http\RedirectResponse;

final class StoreAction extends Controller
{
    public function __construct(
        private readonly StoreResponder $responder
    ) {}

    #[Post(uri: '/genres/store', name: 'genres.store')]
    public function __invoke(
        StoreRequest $request, StoreHandler $handler
    ): RedirectResponse
    {
        return $this->responder->redirect(
            result: $handler->handle(dto: $request->toDto())
        );
    }
}
