<?php declare(strict_types=1);

namespace App\Domain\Genre\Presentations\Web\Delete;

use App\Infrastructure\Controllers\Controller;
use Spatie\RouteAttributes\Attributes\{Delete, WhereUuid};
use App\Domain\Genre\Handlers\DeleteHandler;
use Illuminate\Http\RedirectResponse;

#[WhereUuid(param: 'id')]
final class DeleteAction extends Controller
{
    public function __construct(
        private readonly DeleteResponder $responder,
        private readonly DeleteHandler $handler
    ) {}

    #[Delete(uri: '/genres/{id}/delete', name: 'genres.delete')]
    public function __invoke(string $id): RedirectResponse
    {
        return $this->responder->redirect(
            result: $this->handler->delete(
                id: $id
            )
        );
    }
}
