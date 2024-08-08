<?php declare(strict_types=1);

namespace App\Domain\Genre\Presentations\Web\Edit;

use App\Infrastructure\Responders\ViewResponder;

final readonly class EditResponder
{
    public function respond(string $view, ?array $data, ?array $mergeData): ViewResponder
    {
        return new ViewResponder(
            view: $view ?? 'layouts.default',
            data: $data ?? [],
            mergeData: $dataMerge ?? []
        );
    }
}
