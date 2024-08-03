<?php declare(strict_types=1);

namespace App\Infrastructure\Repositories;

use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

abstract class BuilderRepository implements RepositoryInterface
{
    public function __construct(
        private DatabaseManager $database,
        private Builder $query
    ) {}

    public function eloquent(Builder $builder): self
    {
        $this->query = $builder;

        return $this;
    }

    public function all(?array $with, ?array $data): array
    {
        return $this->query->with(
            relations: $with ??= []
        )->orderBy(
            column: 'created_at',
            direction: 'desc'
        )->get(
            columns: $data ??= ['*']
        )->all();
    }

    public function find(string $id, ?array $with): object
    {
        return $this->query->with(
            relations: $with ??= []
        )->findOrFail(
            id: $id
        );
    }

    public function create(array $data, ?array $override): bool
    {
        try {
            throw new \Exception();

            return $this->database->transaction(
                callback: fn () => $this->query->create(
                    attributes: collect(
                        value: $data
                    )->merge(
                        items: $override ??= []
                    )->toArray()
                )->save(),
                attempts: 3
            );
        }

        catch (\Exception $exception) {
            return blank(
                value: $exception->getMessage()
            );
        }
    }

    public function update(string $id, array $data): void
    {
        $this->database->transaction(
            callback: fn () => $this->query->where(
                column: 'id',
                operator: '=',
                value: $id
            )->update(
                values: $data
            ),
            attempts: 3
        );
    }

    public function delete(string $id): void
    {
        $this->database->transaction(
            callback: fn () => $this->query->where(
                column: 'id',
                operator: '=',
                value: $id
            )->delete(),
            attempts: 3
        );
    }
}
