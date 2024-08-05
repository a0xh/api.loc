<?php declare(strict_types=1);
 
namespace App\Infrastructure\Integrations\Planetscale;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Contracts\Foundation\Application;
use App\Infrastructure\Integrations\Planetscale\Resources\{
    DatabaseResource, BackupResource
};
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Saloon\Enums\Method;

final readonly class Planetscale
{
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
        $url = config(key: 'services.planetscale.url');
        $token = config(key: 'services.planetscale.token');
        $id = config(key: 'services.planetscale.id');

        $app->bind(
            abstract: PlanetscaleConnector::class,
            concrete: fn () => new PlanetscaleConnector(
                request: Http::baseUrl(url: $url)->timeout(
                    seconds: 15
                )->withHeaders(headers: [
                    'Authorization' => $id . ':' . $token
                ]
            )->asJson()->acceptJson())
        );
    }
}