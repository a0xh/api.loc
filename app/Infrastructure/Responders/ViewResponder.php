<?php declare(strict_types=1);

namespace App\Infrastructure\Responders;

use Illuminate\View\View;

abstract readonly class ViewResponder
{
	abstract protected function render(?array $data): View;
}
