<?php declare(strict_types=1);

namespace App\Domain\Genres\Architecture\Web\Show;

use App\Infrastructure\Controllers\Controller;
use Spatie\RouteAttributes\Attributes\{Get, WhereUuid};
use App\Application\Models\Genre;

#[WhereUuid('genre:id')]
final class ShowGenreAction extends Controller
{
    public function __construct(
        private readonly ShowGenreResponder $genreResponder
    ) {}

    #[Get('/admin/genres/{genre:id}/show', name: 'admin.genres.show')]
    public function __invoke(Genre $genre): \Illuminate\View\View
    {
        return $this->genreResponder->handle(['genre' => $genre]);
    }
}
