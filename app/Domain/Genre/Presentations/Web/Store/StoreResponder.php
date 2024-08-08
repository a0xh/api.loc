<?php declare(strict_types=1);

namespace App\Domain\Genre\Presentations\Web\Store;

use App\Infrastructure\Responders\RedirectResponder;

final readonly class StoreResponder
{
    public function respond(bool $result): RedirectResponder
    {
        return new RedirectResponder(
            url: '/genres',
            message: 'messages.admin.genre.store',
            result: $result
        );
    }
}
