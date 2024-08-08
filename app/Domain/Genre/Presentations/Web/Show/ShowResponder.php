<?php declare(strict_types=1);

namespace App\Domain\Genre\Presentations\Web\Show;

use App\Infrastructure\Responders\ViewResponder;

final readonly class ShowResponder
{
    public function handle(string $view, ?array $data, ?array $mergeData): ViewResponder
    {
        return new ViewResponder(
            view: $view ?? 'layouts.default',
            data: $data ?? [],
            mergeData: $dataMerge ?? []
        );
    }
}
