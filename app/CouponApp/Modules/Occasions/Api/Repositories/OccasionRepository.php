<?php

namespace App\CouponApp\Modules\Occasions\Api\Repositories;

use App\CouponApp\BaseCode\Repositories\BaseRepository;
use App\CouponApp\Modules\Occasions\Api\Models\Occasion;
use Spatie\QueryBuilder\QueryBuilder;

class OccasionRepository extends BaseRepository
{
    public function __construct(Occasion $model)
    {
        parent::__construct($model);
    }

    public function all()
    {
        dd($this->model->query()->active()->toRawSql());
        return QueryBuilder::for($this->model->query()->active())
            ->allowedIncludes($this->model->getAllowedIncludes())
            ->allowedFilters($this->model->getAllowedFilters())
            ->allowedSorts($this->model->getAllowedSorts())
            ->defaultSort($this->model->getDefaultSort())
            ->with($this->model->getDefaultIncludes())
            ->paginate(request()->limit)
            ->appends(request()->query());
    }
}
