<?php declare(strict_types=1);
 
namespace App\Infrastructure\Integrations\Planetscale\Resources;
 
use App\Infrastructure\Integrations\Planetscale\Entities\CreateBackup;
use App\Infrastructure\Integrations\Planetscale\PlanetscaleConnector;
use Saloon\Enums\Method;
 
final readonly class BackupResource
{
    public function __construct(
        private PlanetscaleConnector $connector,
    ) {}

    public function create(CreateBackup $entity): array
    {
        try {
            $response = $this->connector->send(
                method: Method::POST,
                uri: str()->of(
                	string: '/organizations/'
                )->append(
                	values: $entity->organization
                )->append(
                	values: $entity->database
                )->append(
                	values: '/branches/'
                )->finish(
                	cap: $entity->branch
                ),
                options: $entity->toRequestBody(),
            );
        } catch (\Throwable $exception) {
            throw new $exception;
        }
 
        return $response->json('data');
    }
}