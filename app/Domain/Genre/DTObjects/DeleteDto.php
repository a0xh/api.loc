<?php declare(strict_types=1);

namespace App\Domain\Genre\DTObjects;

final class DeleteDto
{
    public function __construct(
        private readonly string $id
    ) {}

    public function getId(): string
    {
        return $this->id;
    }

    public function toArray(): array
    {
        return collect(
            value: [
                'id' => $this->getId()
            ]
        )->toArray();
    }
}
