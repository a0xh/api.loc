<?php declare(strict_types=1);

namespace App\Domain\Genre\Handlers;

use App\Domain\Genre\Repositories\GenreRepositoryInterface;

final class DeleteGenreHandler
{
    public function __construct(
        private GenreRepositoryInterface $repository
    ) {}

    public function handle(string $id): bool
    {
        return $this->repository->delete(id: $id);
    }
}
