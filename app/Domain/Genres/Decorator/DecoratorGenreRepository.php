<?php declare(strict_types=1);

namespace App\Domain\Genres\Decorator;

use App\Domain\Genres\Repository\GenreRepositoryInterface;
use App\Application\Models\Genre;

abstract class DecoratorGenreRepository implements GenreRepositoryInterface
{
    protected $genreRepository;

    protected function __construct(GenreRepositoryInterface $genreRepository)
    {
        $this->genreRepository = $genreRepository;
    }

    abstract protected function createGenre(array $data): bool;
    abstract protected function updateGenre(Genre $genre, array $data): bool;
    abstract protected function deleteGenre(Genre $genre): bool;
}
