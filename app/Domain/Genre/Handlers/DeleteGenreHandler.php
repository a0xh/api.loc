<?php declare(strict_types=1);

namespace App\Domain\Genre\Handlers;

use App\Infrastructure\Repositories\RepositoryInterface;

final readonly class DeleteGenreHandler
{
    public function __construct(
        private RepositoryInterface $repository
    ) {}

    public function handle(string $id): bool
    {
        return $this->repository->deleteGenre(id: $id);
    }
}
