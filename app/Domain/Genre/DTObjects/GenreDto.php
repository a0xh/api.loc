<?php declare(strict_types=1);

namespace App\Domain\Genre\DTObjects;

final readonly class GenreDto
{
    public function __construct(
        private string $title,
        private ?string $description,
        private string $slug,
        private ?string $content,
        private ?string $keywords,
        private string $status,
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
        $data = collect(value: [
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'content' => $this->getContent(),
            'slug' => $this->getSlug(),
            'keywords' => $this->getKeywords(),
            'status' => $this->getStatus()
        ]);

        return $data->merge(items: $with)->toArray();
    }
}
