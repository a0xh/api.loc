<?php declare(strict_types=1);

namespace App\Domain\Genre\Presentations\Web\Create;

use App\Infrastructure\Responders\ViewResponder;
use Illuminate\Support\Facades\View;

final readonly class CreateResponder extends ViewResponder
{
    public function render(?array $data): \Illuminate\View\View
    {
        return View::make(
            view: 'admin::genres.create',
            data: $data
        );
    }
}
