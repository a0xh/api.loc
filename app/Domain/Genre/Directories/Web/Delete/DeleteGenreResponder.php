<?php declare(strict_types=1);

namespace App\Domain\Genre\Directories\Web\Delete;

use Illuminate\Http\RedirectResponse;

final readonly class DeleteGenreResponder
{
    public function respond(bool $result): RedirectResponse
    {
        $message = 'messages.admin.genre.delete';
        
        if ($result) {
            session()->flash(
                key: 'success', value: "{$message}.success"
            );

            return redirect(to: '/genres', status: 302, headers: []);
        }

        return back()->with(
            key: 'warning', value: "{$message}.warning"
        );
    }
}
