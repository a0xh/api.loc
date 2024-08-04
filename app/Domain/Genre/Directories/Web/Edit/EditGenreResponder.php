<?php declare(strict_types=1);

namespace App\Domain\Genre\Directories\Web\Edit;

use Illuminate\Support\Facades\View;

final readonly class EditGenreResponder
{
    public function respond(array $data): \Illuminate\View\View
    {
        return View::make(
            view: 'admin::genres.edit', data: $data
        );
    }
}
