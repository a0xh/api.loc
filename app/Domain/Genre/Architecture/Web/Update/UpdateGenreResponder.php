<?php declare(strict_types=1);

namespace App\Domain\Genre\Architecture\Web\Update;

use Illuminate\Http\RedirectResponse;

final readonly class UpdateGenreResponder
{
    public function respond(bool $result): RedirectResponse
    {
        $message = str()->of(string: 'messages.admin.genre.update');
        
        if ($result) {
            session()->flash(
                key: 'success', value: $message->finish(value: '.success')
            );

            return redirect()->route(name: 'genres.index');
        }

        return back()->with(
            key: 'warning', value: $message->finish(value: '.warning')
        );
    }
}
