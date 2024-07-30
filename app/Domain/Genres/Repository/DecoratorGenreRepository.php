<?php declare(strict_types=1);

namespace App\Domain\Genres\Decorator;

abstract class DecoratorGenreRepository implements GenreRepositoryInterface
{
    protected $genreRepository;

    protected function __construct(GenreRepositoryInterface $genreRepository)
    {
        $this->genreRepository = $genreRepository;
    }

    abstract protected function getAllGenre(): array;
}
