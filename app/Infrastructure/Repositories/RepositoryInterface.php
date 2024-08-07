<?php declare(strict_types=1);

namespace App\Infrastructure\Repositories;

use Illuminate\Database\Eloquent\Builder;

interface RepositoryInterface
{
    public function all(?array $with, ?array $fields): array;
    public function find(string $id, ?array $with): array;
    public function create(array $data): bool;
    public function update(string $id, array $data): bool;
    public function delete(string $id): bool;
}
