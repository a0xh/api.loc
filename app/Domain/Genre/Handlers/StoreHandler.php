<?php declare(strict_types=1);

namespace App\Domain\Genre\Handlers;

use App\Infrastructure\Repositories\RepositoryInterface;
use App\Domain\Genre\DTObjects\StoreDto;
use Illuminate\Auth\AuthManager;

final readonly class StoreHandler
{
    public function __construct(
        private RepositoryInterface $repository,
        private AuthManager $auth
    ) {}
    
    public function handle(StoreDto $dto): bool
    {
        return $this->repository->createGenre(
            data: $dto->toArray(
                with: [
                    'user_id' => $this->auth->id()
                ]
            )
        );
    }
}
