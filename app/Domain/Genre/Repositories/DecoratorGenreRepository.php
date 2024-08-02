<?php declare(strict_types=1);

namespace App\Domain\Genre\Repositories;

abstract class DecoratorGenreRepository implements RepositoryGenreInterface
{
    protected $repository;

    protected function __construct(RepositoryGenreInterface $repository)
    {
        $this->repository = $repository;
    }

    abstract protected function all(): array;
}
