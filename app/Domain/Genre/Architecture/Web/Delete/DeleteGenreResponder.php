<?php declare(strict_types=1);

namespace App\Domain\Genre\Architecture\Web\Delete;

use Illuminate\Http\RedirectResponse;

final readonly class DeleteGenreResponder
{
    public function handle(bool $result): RedirectResponse
    {
        $message = str()->of('messages.admin.genre.delete');
        
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
