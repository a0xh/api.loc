<?php declare(strict_types=1);

namespace App\Infrastructure\Responders;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\{RedirectResponse, Response};
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

final readonly class RedirectResponder implements Responsable
{
    public function __construct(
        private string $url,
        private bool $result,
        private string $message,
        private int $status = Response::HTTP_FOUND,
        private array $headers = [],
    ) {}

    public function toResponse($request): RedirectResponse
    {
        $message = Str::of(
            string: $this->message)->append(values: '::'
        );
        
        if ($this->result) {
            Session::flash(
                key: 'success', value: $message->finish(
                    cap: 'success'
                )->__toString()
            );

            return new RedirectResponse(
                url: $this->url,
                status: $this->status,
                headers: $this->headers
            );
        }

        return back()->with(
            key: 'warning', value: $message->finish(
                cap: 'warning'
            )->__toString()
        );
    }
}
