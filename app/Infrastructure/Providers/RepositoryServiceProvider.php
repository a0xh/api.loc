<?php declare(strict_types=1);

namespace App\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            abstract: \App\Infrastructure\Repositories\RepositoryInterface::class,
            concrete: \App\Domain\Genre\Repositories\EloquentRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::addNamespace(
            namespace: 'admin',
            hints: [
                app_path() . '/Infrastructure/Views'
            ]
        );
    }
}
