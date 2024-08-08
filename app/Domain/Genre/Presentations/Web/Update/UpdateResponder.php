<?php declare(strict_types=1);

namespace App\Domain\Genre\Presentations\Web\Update;

use App\Infrastructure\Responders\RedirectResponder;

final readonly class UpdateResponder
{
    public function respond(bool $result): RedirectResponder
    {
        return new RedirectResponder(
            url: '/genres',
            message: 'messages.admin.genre.update',
            result: $result
        );
    }
}
