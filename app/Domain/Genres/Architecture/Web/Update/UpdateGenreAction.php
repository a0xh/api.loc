<?php declare(strict_types=1);

namespace App\Domain\Genres\Architecture\Web\Update;

use App\Infrastructure\Controllers\Controller;
use App\Domain\Genres\Handlers\UpdateGenreHandler;
use Spatie\RouteAttributes\Attributes\{Put, WhereUuid};
use Illuminate\Http\RedirectResponse;
use App\Domain\Genres\Requests\GenreRequest;
use App\Application\Models\Genre;

#[WhereUuid('genre:id')]
final class UpdateGenreAction extends Controller
{
    public function __construct(
        private readonly UpdateGenreResponder $genreResponder
    ) {}

    #[Put('/admin/genres/{genre:id}/update', name: "admin.genres.update")]
    public function __invoke(
        Genre $genre, GenreRequest $genreRequest, UpdateGenreHandler $updateGenreHandler
    ): RedirectResponse
    {
        $genreResponder = $this->genreResponder->handle(
            $updateGenreHandler->handle($genre, $genreRequest->sendGenreDto())
        );

        return $genreResponder;
    }
}
