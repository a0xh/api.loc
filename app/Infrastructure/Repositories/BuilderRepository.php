<?php declare(strict_types=1);

namespace App\Infrastructure\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

abstract class BuilderRepository extends DecoratorRepository
{
    public function __construct(private Builder $query) {}

    public function eloquent(Builder $builder): DecoratorRepository
    {
        $this->query = $builder;

        return $this;
    }

    public function all(?array $with, ?array $fields): array
    {
        return collect(
            value: $this->query->with(
                relations: $with ??= [],
                callback: null
            )->orderBy(
                column: 'created_at',
                direction: 'desc'
            )->get(
                columns: $fields ??= ['*']
            )->all()
        )->toArray();
    }

    public function find(string $id, ?array $with): array
    {
        return collect(
            value: $this->query->with(
                relations: $with ??= [],
                callback: null
            )->findOrFail(
                id: $id,
                columns: ['*']
            )
        )->toArray();
    }

    public function create(array $data): bool
    {
        try {
            return DB::transaction(
                callback: fn() => $this->query->create(
                    attributes: $data
                )->saveOrFail(
                    options: []
                ),
                attempts: 3
            );
        }

        catch (\Exception $exception) {
            return blank(
                value: $exception->getMessage()
            );
        }
    }

    public function update(string $id, array $data): bool
    {
        try {
            $query = DB::transaction(
                callback: fn () => $this->query->where(
                    column: 'id',
                    operator: '=',
                    value: $id,
                    boolean: 'and'
                )->update(
                    values: $data
                ),
                attempts: 3
            );

            return filled(value: $query);
        }

        catch (\Exception $exception) {
            return blank(
                value: $exception->getMessage()
            );
        }
    }

    public function delete(string $id): bool
    {
        try {
            $query = DB::transaction(
                callback: fn () => $this->query->where(
                    column: 'id',
                    operator: '=',
                    value: $id,
                    boolean: 'and'
                )->delete(),
                attempts: 3
            );

            return filled(value: $query);
        }

        catch (\Exception $exception) {
            return blank(
                value: $exception->getMessage()
            );
        }
    }
}
