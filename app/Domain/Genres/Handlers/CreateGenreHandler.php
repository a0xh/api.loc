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

    public function handle(GenreDto $genreDto): bool
    {
        $userId = ['user_id' => Auth::user()->id];

        $data = collect([
            'title' => $genreDto->getTitle(),
            'description' => $genreDto->getDescription(),
            'slug' => $genreDto->getSlug(),
            'keywords' => $genreDto->getKeywords(),
            'status' => $genreDto->getStatus(),
            'content' => $genreDto->getContent()
        ]);

        $createGenre = $this->genreRepository->createGenre(
            $data->merge($userId)->toArray()
        );

        return $createGenre;
    }
}