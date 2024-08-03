<?php declare(strict_types=1);

namespace App\Domain\Genre\Repositories;

use App\Infrastructure\Repositories\BuilderRepository;
use App\Application\Models\Genre;

final class EloquentGenreRepository extends BuilderRepository
{
    public function __construct(
        private readonly Genre $genre
    ) {}

    public function allGenre(): array
    {
        return $this->eloquent(
            builder: $this->genre->query()
        )->all(
            with: ['user'],
            data: null
        );
    }

    public function findGenre(string $id): object
    {
        return $this->eloquent(
            builder: $this->genre->query()
        )->find(
            with: ['user'],
            id: $id
        );
    }

    public function createGenre(array $data): bool
    {
        return $this->create(
            data: $data,
            override: null
        );
    }
}
