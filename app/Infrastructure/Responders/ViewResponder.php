<?php declare(strict_types=1);

namespace App\Infrastructure\Responders;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\View\View as Front;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

final readonly class ViewResponder implements Responsable
{
    public function __construct(
        private string $view,
        private array $data,
        private array $mergeData
    ) {}

    public function toResponse($request): Front
    {
        return View::make(
            view: Str::of(
                string: 'admin'
            )->append(
                values: '::'
            )->finish(
                cap: $this->view
            )->__toString(),
            data: $this->data,
            mergeData: $this->mergeData
        );
    }
}
