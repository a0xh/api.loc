<?php declare(strict_types=1);

namespace App\Infrastructure\Filters;

use Illuminate\Database\Eloquent\Builder;

interface FilterInterface
{
    public static function apply(string $query, ?callable $callback): Builder;
}
