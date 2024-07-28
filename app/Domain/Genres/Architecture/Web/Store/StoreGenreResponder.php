<?php declare(strict_types=1);

namespace App\Domain\Genres\Architecture\Web\Store;

use Illuminate\Http\RedirectResponse;

final readonly class StoreGenreResponder
{
    public function handle(bool $result): RedirectResponse
    {
        $message = 'messages.admin.genre.store';
        
        if ($result) {
            session()->flash("success", "{$message}.success");
            return redirect()->route('admin.genre.index');
        }

        return back()->with("error", "{$message}.error");
    }
}
