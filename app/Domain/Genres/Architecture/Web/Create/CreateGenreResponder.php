<?php declare(strict_types=1);

namespace App\Domain\Genres\Architecture\Web\Create;

use Illuminate\Support\Facades\View;

final readonly class CreateGenreResponder
{
    public function handle(): \Illuminate\View\View
    {
        return View::make('admin::genres.create');
    }
}
