<?php declare(strict_types=1);

namespace App\Domain\Genre\Architecture\Web\Show;

use Illuminate\Support\Facades\View;

final readonly class ShowGenreResponder
{
    public function respond(array $data): \Illuminate\View\View
    {
        return View::make(
            view: 'admin::genres.show',
            data: $data
        );
    }
}
