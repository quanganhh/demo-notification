<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface IBaseRepository
{
    /**
     * Get all
     * @return mixed
     */
    public function all();

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Get one withTrashed
     * @param $id
     * @return mixed
     */
    public function findWithTrashed($id);

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $data);

    /**
     * Update
     * @param Model $model
     * @param array $attributes
     * @return mixed
     */
    public function update(Model $model, array $attributes);

    /**
     * Delete
     * @param Model $model
     * @return mixed
     */
    public function destroy(Model $model);

    /**
     * Delete by id
     * @param Model $model
     * @return mixed
     */
    public function delete($id);

    /**
     * Restore
     * @param $id
     * @return mixed
     */
    public function restore($id);
}
