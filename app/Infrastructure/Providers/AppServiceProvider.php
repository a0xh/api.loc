<?php declare(strict_types=1);

namespace App\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\{Gate, Auth};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $user = Auth::user()->roles->first()->name;

        Gate::define('delete', function() use($user) {
            return $user === 'admin';
        });

        Model::unguard();
        Model::shouldBeStrict();
    }
}
