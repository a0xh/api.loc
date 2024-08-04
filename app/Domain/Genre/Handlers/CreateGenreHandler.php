<?php declare(strict_types=1);

namespace App\Domain\Genre\Handlers;

use App\Infrastructure\Repositories\RepositoryInterface;
use Illuminate\Support\Collection;
use App\Domain\Genre\DTObjects\GenreDto;
use Illuminate\Auth\AuthManager;

final readonly class CreateGenreHandler
{
    public function __construct(
        private RepositoryInterface $repository,
        private AuthManager $auth
    ) {}
    
    public function handle(GenreDto $dto): bool
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
