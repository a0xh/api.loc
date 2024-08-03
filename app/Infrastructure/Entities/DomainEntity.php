<?php declare(strict_types=1);

namespace App\Infrastructure\Entities;

abstract class DomainEntity
{
    abstract public function toArray(): array;
}
