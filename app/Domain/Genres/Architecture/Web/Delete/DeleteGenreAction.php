<?php declare(strict_types=1);

namespace App\Domain\Genres\Architecture\Web\Delete;

use App\Infrastructure\Controllers\Controller;
use App\Domain\Genres\Handlers\DeleteGenreHandler;
use Illuminate\Http\RedirectResponse;
use Spatie\RouteAttributes\Attributes\{Delete, WhereUuid};
use App\Application\Models\Genre;

#[WhereUuid('genre:id')]
final class DeleteGenreAction extends Controller
{
    public function __construct(
        private readonly DeleteGenreResponder $genreResponder
    ) {}

    #[Delete('/admin/genres/{genre:id}/delete', name: "admin.genres.delete")]
    public function __invoke(
        Genre $genre, DeleteGenreHandler $deleteGenreHandler
    ): RedirectResponse
    {
        $genreResponder = $this->genreResponder->handle(
            $deleteGenreHandler->handle($genre)
        );
        
        return $genreResponder;
    }
}
