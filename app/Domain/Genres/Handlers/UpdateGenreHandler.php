<?php declare(strict_types=1);

namespace App\Domain\Genres\Handlers;

use App\Domain\Genres\Repository\GenreRepositoryInterface;
use App\Application\Models\Genre;
use App\Domain\Genres\DTObjects\GenreDto;
use Illuminate\Support\Collection;

final class UpdateGenreHandler
{
    public function __construct(
        private GenreRepositoryInterface $genreRepository
    ) {}

    public function handle(Genre $genre, GenreDto $genreDto): bool
    {
        $userId = ['user_id' => $genre->user->id];

        $data = collect([
            'title' => $genreDto->getTitle(),
            'description' => $genreDto->getDescription(),
            'slug' => $genreDto->getSlug(),
            'keywords' => $genreDto->getKeywords(),
            'status' => $genreDto->getStatus(),
            'content' => $genreDto->getContent()
        ]);

        $updateGenre = $this->genreRepository->updateGenre(
            $genre, $data->merge($userId)->toArray()
        );

        return $updateGenre;
    }
}
