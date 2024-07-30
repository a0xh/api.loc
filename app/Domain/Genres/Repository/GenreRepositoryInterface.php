<?php declare(strict_types=1);

namespace App\Domain\Genres\Repository;

use App\Application\Models\Genre;

interface GenreRepositoryInterface
{
    public function createGenre(array $data): bool;
    public function updateGenre(Genre $genre, array $data): bool;
    public function deleteGenre(Genre $genre): bool;
}
