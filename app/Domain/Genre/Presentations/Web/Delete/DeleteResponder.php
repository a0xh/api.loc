<?php declare(strict_types=1);

namespace App\Domain\Genre\Presentations\Web\Delete;

use App\Infrastructure\Responders\RedirectResponder;

final readonly class DeleteResponder
{
    public function respond(bool $result): RedirectResponder
    {
        return new RedirectResponder(
            url: '/genres',
            message: 'messages.admin.genre.delete',
            result: $result
        );
    }
}
