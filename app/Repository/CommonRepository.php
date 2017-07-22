<?php

namespace App\Repository;

use Carbon\Carbon;
use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class CommonRepository implements RepositoryInterface
{
    /** @var App */
    private $app;
    /** @var Builder */
    protected $model;
    /** @var Carbon */
    protected $carbon;

    /**
     * CommonRepository constructor.
     *
     * @param App $app
     * @param Carbon $carbon
     */
    public function __construct(App $app, Carbon $carbon)
    {
        $this->app = $app;
        $this->carbon = $carbon;
        $this->makeModel();
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    abstract function model();

    /**
     * Make builder of specific model
     * @return \Illuminate\Database\Eloquent\Builder
     *
     * @throws \Exception
     */
    public function makeModel() : Builder
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            throw new \Exception(
                "Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model"
            );
        }

        return $this->model = $model->newQuery();
    }

    /**
     * Create Transaction
     *
     * @param array $params
     *
     * @return mixed
     */
    public function create(array $params)
    {
        return $this->model->create($params);
    }

    /**
     * @param int $id
     * @param array $params
     *
     */
    public function edit(int $id, array $params)
    {
        $this->model->where('id', $id)
            ->update([
                $params
            ]);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id) : bool
    {
        return $this->model->findOrFail($id)->delete();
    }

    /** get all data */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->model->findOrFail($id);
    }
}
