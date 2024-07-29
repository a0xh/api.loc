<?php declare(strict_types=1);

namespace App\Domain\Genres\Architecture\Web\Store;

use App\Infrastructure\Controllers\Controller;
use App\Domain\Genres\Handlers\CreateGenreHandler;
use Spatie\RouteAttributes\Attributes\Post;
use App\Domain\Genres\Requests\GenreRequest;
use Illuminate\Http\RedirectResponse;

final class StoreGenreAction extends Controller
{
    public function __construct(
        private readonly StoreGenreResponder $genreResponder
    ) {}

    #[Post('/admin/genres/store', name: "admin.genres.store")]
    public function __invoke(
        GenreRequest $genreRequest, CreateGenreHandler $createGenreHandler
    ): RedirectResponse
    {
        $genreResponder = $this->genreResponder->handle(
            $createGenreHandler->handle($genreRequest->sendGenreDto())
        );

        return $genreResponder;
    }
}
