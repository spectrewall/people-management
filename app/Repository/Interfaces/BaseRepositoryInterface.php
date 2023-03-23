<?php

namespace App\Repository\Interfaces;

use Illuminate\Support\Collection;

interface BaseRepositoryInterface
{
    /**
     * Returns all entries from a table in database.
     *
     * @return Collection
     */
    public function all(): Collection;
}
