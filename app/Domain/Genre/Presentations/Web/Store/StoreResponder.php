<?php declare(strict_types=1);

namespace App\Domain\Genre\Presentations\Web\Store;

use App\Infrastructure\Responders\RedirectResponder;
use Illuminate\Http\RedirectResponse;

final readonly class StoreResponder extends RedirectResponder
{
    public function redirect(bool $result): RedirectResponse
    {
        $message = 'messages.admin.genre.store';
        
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
