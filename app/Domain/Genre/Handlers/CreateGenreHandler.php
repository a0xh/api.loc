<?php declare(strict_types=1);

namespace App\Domain\Genre\Handlers;

use App\Infrastructure\Repositories\RepositoryInterface;
use Illuminate\Support\Collection;
use App\Domain\Genre\DTObjects\GenreValueObject;
use Illuminate\Auth\AuthManager;

final readonly class CreateGenreHandler
{
    public function __construct(
        private RepositoryInterface $repository,
        private AuthManager $auth
    ) {}
    
    public function handle(GenreValueObject $dto): bool
    {
        return $this->repository->createGenre(
            data: collect(value: [
                'title' => $dto->getTitle(),
                'description' => $dto->getDescription(),
                'content' => $dto->getContent(),
                'slug' => $dto->getSlug(),
                'keywords' => $dto->getKeywords(),
                'status' => $dto->getStatus()
            ])->merge(items: [
                'user_id' => $this->auth->id()
            ])->toArray()
        );
    }
}
