<?php declare(strict_types=1);

namespace App\Domain\Genres\Repository;

interface GenreRepositoryInterface
{
    public function getAllGenre(): array;
}
