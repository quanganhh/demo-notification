<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Interfaces\IBaseRepository;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements IBaseRepository
{
    /** @var Model */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

//    /**
//     * @return mixed
//     * get model
//     */
//    abstract public  function database();
//
//    /**
//     * Checking connection to database
//     */
//    public function isConnection()
//    {
//        return app('connection')->isConnectiond();
//    }
//
//    /**
//     * set model
//     */
//    public function makeModel()
//    {
//        if (!$this->isConnection()) {
//            app('connection')->setDriver('backup');
//        }
//
//        $model = $this->database();
//        if (!app()->make($model)) {
//            app()->singleton($model, function () use ($model) {
//                return new $model;
//            });
//        }
//
//        $this->model = app()->make($model);
//    }

    public function all()
    {
        return $this->model->orderBy('id', 'DESC')->get();
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function insert($data)
    {
        return $this->model->insert($data);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findWithTrashed($id)
    {
        return $this->model->withTrashed()->find($id);
    }

    public function destroy($model)
    {
        return $model->delete();
    }

    public function delete($id)
    {
        $result = $this->find($id);

        if ($result) {
            $result->delete();

            return $result;
        }

        return false;
    }

    public function restore($id)
    {
        $model = $this->model->withTrashed()->find($id);

        return $model->restore();
    }

    public function update($model, $data)
    {
        return $model->update($data);
    }
}
