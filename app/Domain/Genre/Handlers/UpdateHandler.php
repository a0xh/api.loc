<?php declare(strict_types=1);

namespace App\Domain\Genre\Handlers;

use App\Infrastructure\Repositories\RepositoryInterface;
use App\Domain\Genre\DTObjects\UpdateDto;

final readonly class UpdateHandler
{
    public function __construct(
        private RepositoryInterface $repository
    ) {}

    public function update(string $id, UpdateDto $dto): bool
    {
        $genre = $this->repository->findGenre(id: $id);

        return $this->repository->updateGenre(
            id: $id,
            data: $dto->toArray(
                with: ['user_id' => $genre['user']['id']]
            )
        );
    }
}
