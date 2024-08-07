<?php declare(strict_types=1);

namespace App\Domain\Genre\Presentations\Web\Create;

use App\Infrastructure\Controllers\Controller;
use Spatie\RouteAttributes\Attributes\Get;

final class CreateAction extends Controller
{
    public function __construct(
        private readonly CreateResponder $responder
    ) {}

    #[Get(uri: '/genres/create', name: 'genres.create')]
    public function __invoke(): \Illuminate\View\View
    {
        return $this->responder->render([]);
    }
}
