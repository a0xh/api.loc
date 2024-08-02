<?php declare(strict_types=1);

namespace App\Domain\Genre\Handlers;

use App\Domain\Genre\Repositories\GenreRepositoryInterface;
use App\Domain\Genre\DTObjects\GenderValueObject;
use Illuminate\Support\Collection;

final class UpdateGenreHandler
{
    public function __construct(
        private readonly GenreRepositoryInterface $repository
    ) {}

    public function handle(string $id, GenderValueObject $dto): bool
    {
        $genre = $this->repository->find(id: $id);
        $userId = ['user_id' => $genre->user->id];

        $data = collect(value: [
            'title' => $dto->getTitle(),
            'description' => $dto->getDescription(),
            'slug' => $dto->getSlug(),
            'keywords' => $dto->getKeywords(),
            'status' => $dto->getStatus(),
            'content' => $dto->getContent()
        ]);

        return $this->repository->update(id: $id,
            data: $data->merge(items: $userId)->toArray()
        );
    }
}
