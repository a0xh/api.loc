<?php declare(strict_types=1);
 
namespace App\Infrastructure\Integrations\Planetscale\Connectors;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Contracts\Foundation\Application;
use App\Infrastructure\Integrations\Planetscale\Resources\{
    DatabaseResource, BackupResource
};
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Saloon\Enums\Method;

final readonly class PlanetscaleConnector
{
    private const TTL = 15;

    private $request;

    public function __construct(PendingRequest $request)
    {
        $this->request = $request;
    }
 
    public function databases(): DatabaseResource
    {
        return new DatabaseResource(connector: $this);
    }
 
    public function backups(): BackupResource
    {
        return new BackupResource(connector: $this);
    }

    public function send(Method $method, string $uri, ?array $options): Response
    {
        return $this->request->send(
            method: $method->value,
            url: $uri,
            options: $options ??= [],
        )->throw();
    }
 
    public static function register(Application $app): void
    {
        $app->bind(
            abstract: PlanetscaleConnector::class,
            concrete: fn () => new PlanetscaleConnector(
                request: Http::baseUrl(
                    url: config(
                        key: 'services.planetscale.url'
                    )
                )->timeout(
                    seconds: self::TTL
                )->withHeaders(
                    headers: [
                        'Authorization' => $token str()->of(
                            string: config(
                                key: 'services.planetscale.id'
                            )
                        )->append(values: ' : ')->finish(
                            cap: config(
                                key: 'services.planetscale.token'
                            )
                        )->__toString()
                    ]
                )->asJson()->acceptJson()
            )
        );
    }
}
