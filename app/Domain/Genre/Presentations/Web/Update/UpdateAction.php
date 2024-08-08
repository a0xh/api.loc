<?php declare(strict_types=1);

namespace App\Domain\Genre\Presentations\Web\Update;

use App\Infrastructure\Controllers\Controller;
use Spatie\RouteAttributes\Attributes\{Put, WhereUuid};
use App\Domain\Genre\Handlers\UpdateHandler;
use App\Domain\Genre\Requests\UpdateRequest;
use App\Infrastructure\Responders\RedirectResponder;

#[WhereUuid(param: 'id')]
final class UpdateAction extends Controller
{
    public function __construct(
        private readonly UpdateResponder $responder,
        private readonly UpdateHandler $handler
    ) {}

    #[Put(uri: '/genres/{id}/update', name: 'genres.update')]
    public function __invoke(string $id, UpdateRequest $request): RedirectResponder
    {
        return $this->responder->respond(
            result: $this->handler->handle(
                id: $id,
                dto: $request->toDto()
            )
        );
    }
}
