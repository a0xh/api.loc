<?php declare(strict_types=1);

namespace App\Domain\Genre\Handlers;

use App\Infrastructure\Repositories\RepositoryInterface;
use App\Domain\Genre\DTObjects\DeleteDto;

final readonly class DeleteHandler
{
    public function __construct(
        private RepositoryInterface $repository
    ) {}

    public function delete(string $id): bool
    {
        return $this->repository->deleteGenre(
            id: $id
        );
    }
}
