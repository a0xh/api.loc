<?php declare(strict_types=1);

namespace App\Infrastructure\Responders;

use Illuminate\Http\RedirectResponse;

abstract readonly class RedirectResponder
{
	abstract protected function redirect(bool $result): RedirectResponse;
}
