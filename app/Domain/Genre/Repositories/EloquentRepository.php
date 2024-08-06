<?php declare(strict_types=1);

namespace App\Domain\Genre\Repositories;

use App\Infrastructure\Repositories\BuilderRepository;
use App\Application\Models\Genre;

final class EloquentRepository extends BuilderRepository
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
            fields: null
        );
    }

    public function findGenre(string $id): array
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
        return $this->eloquent(
            builder: $this->genre->query()
        )->create(
            data: $data
        );
    }

    public function updateGenre(string $id, array $data): bool
    {
        return $this->eloquent(
            builder: $this->genre->query()
        )->update(
            id: $id,
            data: $data
        );
    }

    public function deleteGenre(string $id): bool
    {
        return $this->eloquent(
            builder: $this->genre->query()
        )->delete(
            id: $id
        );
    }
}
