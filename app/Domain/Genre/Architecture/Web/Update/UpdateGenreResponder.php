<?php declare(strict_types=1);

namespace App\Domain\Genre\Architecture\Web\Update;

use Illuminate\Http\RedirectResponse;

final readonly class UpdateGenreResponder
{
    public function handle(bool $result): RedirectResponse
    {
        $message = str()->of('messages.admin.genre.update');
        
        if ($result) {
            session()->flash(
                key: "success", value: $message->finish('.success')
            );

            return redirect()->route(name: 'admin.genres.index');
        }

        return back()->with(
            key: "warning", value: $message->finish('.warning')
        );
    }
}
