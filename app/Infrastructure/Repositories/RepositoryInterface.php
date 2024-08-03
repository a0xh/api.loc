<?php declare(strict_types=1);

namespace App\Infrastructure\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface RepositoryInterface
{
    public function all(?array $with, ?array $fields): array;
    public function find(string $id, ?array $with): object;
    public function create(array $data, ?array $override): bool;
    public function update(string $id, array $data): void;
    public function delete(string $id): void;
}
