<?php declare(strict_types=1);

namespace App\Infrastructure\Integrations\Planetscale\Resources;

use App\Infrastructure\Integrations\Planetscale\PlanetscaleConnector;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;

final readonly class DatabaseResource
{
    public function __construct(
        private PlanetscaleConnector $connector,
    ) {}

    public function list(): void
    {
        try {
            $response = $this->connector->send(
                method: Method::GET,
                uri: "/organizations/{$organization}/databases",
                options: null
            );
        } catch (\Throwable $exception) {
            throw new $exception;
        }

        return $response->collect(value: 'data');
    }

    public function regions(): void
    {
        //
    }
}