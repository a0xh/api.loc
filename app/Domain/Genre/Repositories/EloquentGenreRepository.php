<?php declare(strict_types=1);

namespace App\Domain\Genre\Repositories;

final class EloquentGenreRepository extends DecoratorGenreRepository
{
    public function __construct(private readonly Genre $genre) {}

    public function all(): array
    {
        return $this->genre->query()->with(relations: 'user')->orderByDesc(column: 'created_at')->get()->all();
    }

    public function create(array $data): bool
    {
        return $this->genre->create(attributes: $data)->save();
    }

    public function update(string $id, array $data): bool
    {
        return $this->genre->where(key: 'id', operator: '==', value: $id)->update(values: $data);
    }

    public function delete(string $id): bool
    {
        return $this->genre->where(key: 'id', operator: '==', value: $id)->delete();
    }
}
