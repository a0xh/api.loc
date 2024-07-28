<?php declare(strict_types=1);

namespace App\Domain\Genres\Repository;

use App\Domain\Genres\Handlers\CreateGenreHandler;
use App\Domain\Genres\DTObjects\GenreDto;
use App\Domain\Genres\Decorator\DecoratorGenreRepository;
use App\Application\Models\Genre;

final class EloquentGenreRepository extends DecoratorGenreRepository
{
    public function __construct(private Genre $genre) {}

    public function getAllGenre(): array
    {
        $getAllGenre = $this->genre->query()->with('user');

        return $getAllGenre->orderByDesc('created_at')->get()->all();
    }

    public function createGenre(array $data): bool
    {
        $createGenre = $this->genre->create($data);

        return $createGenre->save();
    }

    public function updateGenre(Genre $genre, array $data): bool
    {
        $updateGenre = $genre->update($genre, $data);

        return $updateGenre->save();
    }

    public function deleteGenre(Genre $genre): bool
    {
        $deleteGenre = $genre->delete();

        return $deleteGenre;
    }
}
