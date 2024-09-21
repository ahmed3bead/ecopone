<?php

namespace App\CouponApp\Modules\Occasions\Api\Services;

use App\CouponApp\BaseCode\Requests\BaseRequest;
use App\CouponApp\Modules\Occasions\Api\Repositories\OccasionRepository;

use App\CouponApp\BaseCode\Services\BaseService;

class OccasionService extends BaseService
{

    public function __construct(OccasionRepository $repository)
    {
        parent::__construct($repository);
        $this->repository = $repository;
    }

    public function getAll(BaseRequest $request)
    {
        $response = $this->response();
        if (request('listing'))
            return $response->setData($this->repository->minimalListWithFilter())->setStatusCode(200);
        $paginator = $this->repository->paginate();
        return $response
            ->setData($paginator->items() ?? [])
            ->setMeta([
                'currentPage' => $paginator->currentPage(),
                'lastPage' => $paginator->lastPage(),
                'path' => $paginator->path(),
                'perPage' => $paginator->perPage(),
                'total' => $paginator->total(),
            ])
            ->setStatusCode(200);
    }


    // Add any additional API-specific methods or overrides here
}
