<?php declare(strict_types=1);

namespace App\Domain\Genres\Repository;

use Illuminate\Support\Facades\DB;
use App\Application\Models\Genre;

final class TransactionGenreRepository implements GenreRepositoryInterface
{
    public function __construct(
        private readonly EloquentGenreRepository $eloquentGenreRepository
    ) {}

    public function createGenre(array $data): bool
    {
        try {
            $createGenreTransaction = DB::transaction(function() use($data): void {
                return $this->eloquentGenreRepository->createGenre($data);
            }, 3);

            return $createGenreTransaction;
        }

        catch (\ExternalServiceException $externalServiceException) {
            return blank($externalServiceException);
        }
    }

    public function updateGenre(Genre $genre, array $data): bool
    {
        try {
            $updateGenreTransaction = DB::transaction(function() use($genre, $data): void {
                return $this->eloquentGenreRepository->updateGenre($genre, $data);
            }, 3);

            return $updateGenreTransaction;
        }

        catch (\ExternalServiceException $externalServiceException) {
            return blank($externalServiceException);
        }
    }

    public function deleteGenre(Genre $genre): bool
    {
        try {
            $deleteGenreTransaction = DB::transaction(function() use($genre): void {
                return $this->eloquentGenreRepository->deleteGenre($genre);
            }, 3);

            return $deleteGenreTransaction;
        }

        catch (\ExternalServiceException $externalServiceException) {
            return blank($externalServiceException);
        }
    }
}
