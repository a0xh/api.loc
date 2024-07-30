<?php declare(strict_types=1);

namespace App\Domain\Genres\Architecture\Web\Edit;

use App\Infrastructure\Controllers\Controller;
use Spatie\RouteAttributes\Attributes\{Get, WhereUuid};
use App\Application\Models\Genre;

#[WhereUuid('genre:id')]
final class EditGenreAction extends Controller
{
    public function __construct(
        private readonly EditGenreResponder $genreResponder
    ) {}

    #[Get('/admin/genres/{genre:id}/edit', name: 'admin.genres.edit')]
    public function __invoke(Genre $genre): \Illuminate\View\View
    {
        return $this->genreResponder->handle(['genre' => $genre]);
    }
}
