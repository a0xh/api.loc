<?php declare(strict_types=1);

namespace App\Domain\Genres\Architecture\Web\Index;

use App\Infrastructure\Controllers\Controller;
use App\Domain\Genres\Repository\GenreRepositoryInterface;
use Spatie\RouteAttributes\Attributes\Get;

final class IndexGenreAction extends Controller
{
    public function __construct(
        private readonly GenreRepositoryInterface $genreRepository,
        private readonly IndexGenreResponder $genreResponder
    ) {}

    #[Get('/admin/genres', name: 'admin.genres.index')]
    public function __invoke(): \Illuminate\View\View
    {
        return $this->genreResponder->handle(
            data: ['genres' => $this->genreRepository->getAllGenre()]
        );
    }
}
