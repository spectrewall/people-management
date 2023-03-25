<?php

namespace App\Repository\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface BaseRepositoryInterface
{
    /**
     * Returns all entries from a table in database.
     *
     * @return Collection
     */
    public function all(): Collection;

    /**
     * Tries to find a model by its primary key. If the model is not found an exception will be thrown.
     *
     * @param int $id
     * @return Model
     */
    public function findOrFail(int $id): Model;

    /**
     * Updates a model in the database.
     *
     * @param array $attributes
     * @param int|string|Model $modelOrId
     * @return Model
     */
    public function update(array $attributes, int|string|Model $modelOrId): Model;
}
