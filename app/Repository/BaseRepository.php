<?php

namespace App\Repository;

use App\Repository\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

abstract class BaseRepository implements BaseRepositoryInterface
{
    /** @var Model $model */
    protected Model $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function findOrFail(int $id): Model
    {
        return $this->model->newQuery()->findOrFail($id);
    }

    public function update(array $attributes, int|string|Model $modelOrId): Model
    {
        $model = $modelOrId instanceof Model ?
            $modelOrId :
            $this->model->newQuery()->findOrFail(intval($modelOrId));

        $fillableAttributes = Arr::only($attributes, $this->model->getFillable());
        $model->update($fillableAttributes);
        return $model->fresh();
    }
}
