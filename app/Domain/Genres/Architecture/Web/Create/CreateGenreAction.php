<?php declare(strict_types=1);

namespace App\Domain\Genres\Architecture\Web\Create;

use App\Infrastructure\Controllers\Controller;
use Spatie\RouteAttributes\Attributes\Get;

final class CreateGenreAction extends Controller
{
    public function __construct(
        private readonly CreateGenreResponder $genreResponder
    ) {}

    #[Get('/admin/genres/create', name: 'admin.genres.create')]
    public function __invoke(): \Illuminate\View\View
    {
        return $this->genreResponder->handle();
    }
}
