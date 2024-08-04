<?php declare(strict_types=1);

namespace App\Domain\Genre\Directories\Web\Create;

use Illuminate\Support\Facades\View;

final readonly class CreateGenreResponder
{
    public function respond(array $data): \Illuminate\View\View
    {
        return View::make(
            view: 'admin::genres.create', data: $data
        );
    }
}
