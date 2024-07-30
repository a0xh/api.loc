<?php declare(strict_types=1);

namespace App\Domain\Genres\Architecture\Web\Edit;

use Illuminate\Support\Facades\View;

final readonly class EditGenreResponder
{
    public function handle(array $data): \Illuminate\View\View
    {
        return View::make('admin::genres.edit', $data);
    }
}
