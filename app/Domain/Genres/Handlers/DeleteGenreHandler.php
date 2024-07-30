<?php declare(strict_types=1);

namespace App\Domain\Genres\Handlers;

use App\Domain\Genres\Repository\GenreRepositoryInterface;
use App\Application\Models\Genre;

final class DeleteGenreHandler
{
    public function __construct(
        private GenreRepositoryInterface $genreRepository
    ) {}

    public function handle(Genre $genre): bool
    {
        return $this->genreRepository->deleteGenre($genre);
    }
}
