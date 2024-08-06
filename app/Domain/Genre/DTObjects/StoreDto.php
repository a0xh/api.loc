<?php declare(strict_types=1);

namespace App\Domain\Genre\DTObjects;

final class StoreDto
{
    public function __construct(
        private readonly string $title,
        private readonly ?string $description,
        private readonly string $slug,
        private readonly ?string $content,
        private readonly ?string $keywords,
        private readonly string $status,
    ) {}

    public function getTitle(): string
    {
        return $this->title;
    }

    private function getDescription(): ?string
    {
        return $this->description;
    }

    private function getContent(): ?string
    {
        return $this->content;
    }

    private function getSlug(): string
    {
        return $this->slug;
    }

    private function getKeywords(): ?string
    {
        return $this->keywords;
    }

    private function getStatus(): string
    {
        return $this->status;
    }

    public function toArray(?array $with): array
    {
        $data = [
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'content' => $this->getContent(),
            'slug' => $this->getSlug(),
            'keywords' => $this->getKeywords(),
            'status' => $this->getStatus()
        ];

        return collect(value: $data)->merge(
            items: $with
        )->toArray();
    }
}
