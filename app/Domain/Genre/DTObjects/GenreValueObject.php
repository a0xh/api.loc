<?php declare(strict_types=1);

namespace App\Domain\Genre\DTObjects;

final class GenreValueObject
{
    public function __construct(
        private readonly string $title,
        private readonly ?string $description,
        private readonly ?string $content,
        private readonly string $slug,
        private readonly ?string $keywords,
        private readonly string $status,
    ) {}

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}
