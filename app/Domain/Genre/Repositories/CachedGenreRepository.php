<?php declare(strict_types=1);

namespace App\Domain\Genre\Repositories;

use Illuminate\Cache\CacheManager;

final class CachedGenreRepository extends DecoratorGenreRepository
{
    private const TTL = 1440;

    public function __construct(
        private readonly EloquentGenreRepository $eloquent,
        private readonly TransactionGenreRepository $transaction,
        private readonly CacheManager $cache
    ) {}

    public function all(): array
    {
        if (config(key: 'cache.status')) {
            return $this->cache->remember(
                key: 'genre_all', ttl: self::TTL, callback: function() {
                return $this->eloquent->all();
            });
        }

        return $this->eloquent->all();
    }

    public function create(array $data): bool
    {
        if (config(key: 'cache.status')) {
            $this->cache->pull(key: 'genre_all');
        }

        return $this->transaction->create(data: $data);
    }

    public function update(string $id, array $data): bool
    {
        if (config(key: 'cache.status')) {
            $this->cache->pull(key: 'genre_all');
        }

        return $this->transaction->update($id, $data);
    }

    public function delete(string $id): bool
    {
        if (config(key: 'cache.status')) {
            $this->cache->forget(key: 'genre_all');
        }

        return $this->transaction->delete(id: $id);
    }
}
