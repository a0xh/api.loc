<?php declare(strict_types=1);

namespace App\Domain\Genre\Architecture\Web\Create;

use Illuminate\Support\Facades\View;

final readonly class CreateGenreResponder
{
    public function handle(): \Illuminate\View\View
    {
        return View::make(
            view: 'admin::genres.create'
        );
    }
}
