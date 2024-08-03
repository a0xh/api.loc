<?php declare(strict_types=1);

namespace App\Domain\Genre\Architecture\Web\Create;

use App\Infrastructure\Controllers\Controller;
use Spatie\RouteAttributes\Attributes\Get;

final class CreateGenreAction extends Controller
{
    public function __construct(
        private readonly CreateGenreResponder $responder
    ) {}

    #[Get('/genres/create', name: 'genres.create')]
    public function __invoke(): \Illuminate\View\View
    {
        return $this->responder->handle();
    }
}
