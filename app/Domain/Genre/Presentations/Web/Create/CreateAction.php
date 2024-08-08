<?php declare(strict_types=1);

namespace App\Domain\Genre\Presentations\Web\Create;

use App\Infrastructure\Controllers\Controller;
use Spatie\RouteAttributes\Attributes\Get;
use App\Infrastructure\Responders\ViewResponder;

final class CreateAction extends Controller
{
    public function __construct(
        private readonly CreateResponder $responder
    ) {}

    #[Get(uri: '/genres/create', name: 'genres.create')]
    public function __invoke(): ViewResponder
    {
        return $this->responder->respond(
            view: 'genres.create',
            data: null,
            mergeData: null
        );
    }
}
