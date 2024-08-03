<?php declare(strict_types=1);

namespace App\Domain\Genre\Architecture\Web\Store;

use Illuminate\Http\RedirectResponse;

final readonly class StoreGenreResponder
{
    public function respond(bool $result): RedirectResponse
    {
        $message = str()->of('messages.admin.genre.store');
        
        if ($result) {
            session()->flash(
                key: "success", value: $message->finish('.success')
            );

            return redirect()->route('genres.index');
        }

        return back()->with(
            key: "warning", value: $message->finish('.warning')
        );
    }
}
