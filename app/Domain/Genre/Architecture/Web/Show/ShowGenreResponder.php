<?php declare(strict_types=1);

namespace App\Domain\Genres\Architecture\Web\Show;

use Illuminate\Support\Facades\View;

final readonly class ShowGenreResponder
{
    public function handle(array $data): \Illuminate\View\View
    {
        return View::make('admin::genres.show', $data);
    }
}
