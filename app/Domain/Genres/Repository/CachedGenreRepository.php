<?php declare(strict_types=1);

namespace App\Domain\Genres\Repository;

use App\Application\Models\Genre;
use Illuminate\Cache\CacheManager;

final class CachedGenreRepository extends DecoratorGenreRepository implements GenreRepositoryInterface
{
    private const TTL = 1440;

    public function __construct(
        private readonly EloquentGenreRepository $eloquentGenreRepository,
        private readonly TransactionGenreRepository $transactionGenreRepository,
        private readonly CacheManager $cacheManager
    ) {}

    public function getAllGenre(): array
    {
        if (config('cache.status')) {
            $getAllGenre = $this->cacheManager->remember('genre_all', self::TTL, function() {
                return $this->eloquentGenreRepository->getAllGenre();
            });

            return $getAllGenre;
        }

        return $this->eloquentGenreRepository->getAllGenre();
    }

    public function createGenre(array $data): bool
    {
        $createGenre = $this->transactionGenreRepository->createGenre($data);

        if (config('cache.status')) {
            $this->cacheManager->pull('genre_all');
        }

        return $createGenre;
    }

    public function updateGenre(Genre $genre, array $data): bool
    {
        $updateGenre = $this->transactionGenreRepository->updateGenre($genre, $data);

        if (config('cache.status')) {
            $this->cacheManager->pull('genre_all');
        }

        return $updateGenre;
    }

    public function deleteGenre(Genre $genre): bool
    {
        $deleteGenre = $this->transactionGenreRepository->deleteGenre($genre);

        if (config('cache.status')) {
            $this->cacheManager->forget('genre_all');
        }

        return $deleteGenre;
    }
}
