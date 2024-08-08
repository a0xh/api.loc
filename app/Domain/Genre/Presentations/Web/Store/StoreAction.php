<?php declare(strict_types=1);

namespace App\Domain\Genre\Presentations\Web\Store;

use App\Infrastructure\Controllers\Controller;
use Spatie\RouteAttributes\Attributes\Post;
use App\Domain\Genre\Requests\StoreRequest;
use App\Domain\Genre\Handlers\StoreHandler;
use App\Infrastructure\Responders\RedirectResponder;

final class StoreAction extends Controller
{
    public function __construct(
        private readonly StoreResponder $responder,
        private readonly StoreHandler $handler
    ) {}

    #[Post(uri: '/genres/store', name: 'genres.store')]
    public function __invoke(StoreRequest $request): RedirectResponder
    {
        return $this->responder->respond(
            result: $this->handler->handle(
                dto: $request->toDto()
            )
        );
    }
}
