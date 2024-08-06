<?php declare(strict_types=1);

namespace App\Domain\Genre\Presentations\Web\Show;

use App\Infrastructure\Responders\ViewResponder;
use Illuminate\Support\Facades\View;

final readonly class ShowResponder extends ViewResponder
{
    public function render(?array $data): \Illuminate\View\View
    {
        return View::make(
            view: 'admin::genres.show',
            data: $view
        );
    }
}
