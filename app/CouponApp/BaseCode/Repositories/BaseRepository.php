<?php

namespace App\CouponApp\BaseCode\Repositories;

use App\CouponApp\BaseCode\Interfaces\IModel;
use App\CouponApp\BaseCode\Interfaces\IRepository;
use Spatie\QueryBuilder\QueryBuilder;

abstract class BaseRepository implements IRepository
{
    protected IModel $model;

    public function __construct(Imodel $model)
    {
        $this->model = $model;
    }


    public function all()
    {
        return QueryBuilder::for($this->model->query())
            ->allowedIncludes($this->model->getAllowedIncludes())
            ->allowedFilters($this->model->getAllowedFilters())
            ->allowedSorts($this->model->getAllowedSorts())
            ->defaultSort($this->model->getDefaultSort())
            ->with($this->model->getDefaultIncludes())
            ->paginate(request()->limit)
            ->appends(request()->query());


    }

    public function minimalListWithFilter(
        array $listFields = ['id', 'name'],
        array $where = []
    ): \Illuminate\Database\Eloquent\Collection|array
    {
        return QueryBuilder::for($this->model->query())
            ->select($this->model->getDefaultListingFields())
            ->where($where)
            ->allowedIncludes($this->model->getAllowedIncludes())
            ->allowedFilters($this->model->getAllowedFilters())
            ->allowedSorts($this->model->getAllowedSorts())
            ->defaultSort($this->model->getDefaultSort())
            ->with($this->model->getDefaultIncludes())
            ->get();
    }


    public function find($id)
    {
        return QueryBuilder::for($this->model->query())
            ->allowedIncludes($this->model->getAllowedIncludes())
            ->allowedFilters($this->model->getAllowedFilters())
            ->with($this->model->getDefaultIncludes())
            ->findOrFail($id);
    }

    public function findByField($field, $value, $extraConditions = [])
    {
        $query = QueryBuilder::for($this->model->query())
            ->allowedIncludes($this->model->getAllowedIncludes())
            ->allowedFilters($this->model->getAllowedFilters())
            ->with($this->model->getDefaultIncludes())
            ->where([$field => $value]);
        if (!empty($extraConditions)) {
            $query->where($extraConditions);
        }
        return $query->first();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $model = $this->model->find($id);
        if ($model) {
            $model->update($data);
            return $model;
        }
        return null;
    }

    public function delete($id)
    {
        $model = $this->model->find($id);
        if ($model) {
            return $model->delete();
        }
        return null;
    }
}
