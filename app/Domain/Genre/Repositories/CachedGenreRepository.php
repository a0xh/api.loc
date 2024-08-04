<?php declare(strict_types=1);

namespace App\Domain\Genre\Repositories;

use App\Infrastructure\Repositories\BuilderRepository;
use Illuminate\Cache\CacheManager;

final class CachedGenreRepository extends BuilderRepository
{
    private const TTL = 1440;

    public function __construct(
        private readonly EloquentGenreRepository $eloquent,
        private readonly CacheManager $cache
    ) {}

    public function allGenre(): array
    {
        return $this->cache->remember(
            key: str()->of(string: 'genre_all'),
            ttl: self::TTL,
            callback: fn () => $this->eloquent->allGenre()
        );
    }

    public function findGenre(string $id): object
    {
        return $this->eloquent->findGenre(
            id: $id
        );
    }

    public function createGenre(array $data): bool
    {
        $this->cache->pull(
            key: str()->of(string: 'genre_all')
        );

        return $this->eloquent->createGenre(
            data: $data
        );
    }

    public function updateGenre(string $id, array $data): bool
    {
        $this->cache->pull(
            key: str()->of(string: 'genre_all')
        );

        return $this->eloquent->updateGenre(
            id: $id,
            data: $data
        );
    }

    public function deleteGenre(string $id): bool
    {
        $this->cache->forget(
            key: str()->of(string: 'genre_all')
        );

        return $this->eloquent->deleteGenre(
            id: $id
        );
    }
}
