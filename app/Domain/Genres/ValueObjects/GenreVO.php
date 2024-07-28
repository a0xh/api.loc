<?php declare(strict_types=1);

namespace App\Domains\Genres\ValueObjects;

use Illuminate\Support\Arr;

final class GenreVO
{
    public function __construct(
        public string $title,
        public string $slug,
        public string $description,
        public string $keywords,
        public string $content,
        public string $status
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            Arr::get($data, 'title'),
            Arr::get($data, 'description'),
            Arr::get($data, 'slug'),
            Arr::get($data, 'keywords'),
            Arr::get($data, 'status'),
            Arr::get($data, 'content')
        );
    }
}
