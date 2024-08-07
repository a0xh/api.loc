<?php declare(strict_types=1);

namespace App\Application\Filters;

use App\Infrastructure\Repositories\DecoratorRepository;
use App\Infrastructure\Filters\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

class SearchFilter extends DecoratorRepository implements FilterInterface
{
    public function __construct(private Builder $Builder) {}

    public function builder(Builder $Builder): Builder
    {
        $this->builder = $builder;

        return $this;
    }

    public static function apply(string $query, ?callable $callback): Builder
    {
        return $this->builder->search(
            query: $query,
            callback: $callback
        )->get()->all();
    }
}
