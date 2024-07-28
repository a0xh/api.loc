<?php declare(strict_types=1);

namespace App\Domain\Genres\Handlers;

use App\Domain\Genres\Repository\GenreRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\Domain\Genres\DTObjects\GenreDto;
use Illuminate\Support\Collection;

final class CreateGenreHandler
{
    public function __construct(
        private GenreRepositoryInterface $genreRepository
    ) {}

    public function handle(GenreDto $dto): bool
    {
        $userId = ['user_id' => Auth::user()->id];

        $data = collect([
            'title' => $dto->genre->title,
            'description' => $dto->genre->description,
            'slug' => $dto->genre->slug,
            'keywords' => $dto->genre->keywords,
            'status' => $dto->genre->status,
            'content' => $dto->genre->content
        ]);

        $createGenre = $this->genreRepository->createGenre(
            $data->merge($userId)->toArray()
        );

        return $createGenre;
    }
}