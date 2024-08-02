<?php declare(strict_types=1);

namespace App\Domain\Genre\Repositories;

interface RepositoryGenreInterface
{
    public function create(array $data): bool;
    public function update(string $id, array $data): bool;
    public function delete(string $id): bool;
}
