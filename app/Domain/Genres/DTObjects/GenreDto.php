<?php declare(strict_types=1);

namespace App\Domain\Genres\DTObjects;

use App\Domain\Genres\ValueObjects\GenreVO;
use Illuminate\Support\Arr;

final readonly class GenreDto
{
    public function __construct(public GenreVO $genre) {}

    public static function fromArray(array $data): self
    {
        $genreDto = Arr::get($data, 'genre');
        $genreValueObjects = GenreVO::fromArray($genreDto);

        return new self($genreValueObjects);
    }
}
