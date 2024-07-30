<?php declare(strict_types=1);

namespace App\Domain\Genres\Architecture\Web\Update;

use Illuminate\Http\RedirectResponse;

final readonly class UpdateGenreResponder
{
    public function handle(bool $result): RedirectResponse
    {
        $message = 'messages.admin.genre.update';
        
        if ($result) {
            session()->flash("success", "{$message}.success");
            return redirect()->route('admin.genres.index');
        }

        return back()->with("warning", "{$message}.warning");
    }
}
