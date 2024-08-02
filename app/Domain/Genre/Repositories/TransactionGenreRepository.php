<?php declare(strict_types=1);

namespace App\Domain\Genre\Repositories;

use Illuminate\Support\Facades\DB;

final class TransactionGenreRepository implements RepositoryGenreInterface
{
    public function __construct(
        private readonly EloquentRepository $eloquent
    ) {}

    public function create(array $data): bool
    {
        try {
            return DB::transaction(function() use($data): bool {
                return $this->eloquent->create(data: $data);
            }, 3);
        }

        catch (\ExternalServiceException $exception) {
            return blank(value: $exception);
        }
    }

    public function update(string $id, array $data): bool
    {
        try {
            return DB::transaction(function() use($id, $data): bool {
                return $this->eloquent->update(id: $id, data: $data);
            }, 3);
        }

        catch (\ExternalServiceException $exception) {
            return blank(value: $exception);
        }
    }

    public function delete(string $id): bool
    {
        try {
            return DB::transaction(function() use($id): bool {
                return $this->eloquent->delete(id: $id);
            }, 3);
        }

        catch (\ExternalServiceException $exception) {
            return blank(value: $exception);
        }
    }
}
