<?php declare(strict_types=1);

namespace App\Infrastructure\Repositories;

use Illuminate\Database\Eloquent\Builder;

abstract class DecoratorRepository implements RepositoryInterface
{
	private $repository;

	protected function __construct(RepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	abstract protected function eloquent(Builder $builder): self;
}
