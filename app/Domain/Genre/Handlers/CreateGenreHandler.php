<?php declare(strict_types=1);

namespace App\Domain\Genre\Handlers;

use App\Domain\Genre\Repositories\RepositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\Domain\Genre\DTObjects\GenderValueObject;
use Illuminate\Support\Collection;

final readonly class CreateGenreHandler
{
    public function __construct(
        private RepositoryInterface $repository
    ) {}

    public function handle(GenderValueObject $gto): bool
    {
        $userId = ['user_id' => Auth::user()->id];

        $data = collect(value: [
            'title' => $gto->getTitle(),
            'description' => $gto->getDescription(),
            'slug' => $gto->getSlug(),
            'keywords' => $gto->getKeywords(),
            'status' => $gto->getStatus(),
            'content' => $gto->getContent()
        ]);

        return $this->repository->create(
            data: $data->merge(items: $userId)->toArray()
        );
    }
}
