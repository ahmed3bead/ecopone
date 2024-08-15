<?php

namespace App\CouponApp\BaseCode\Services;


use App\CouponApp\BaseCode\Http\HttpStatus;
use App\CouponApp\BaseCode\Http\Response;
use App\CouponApp\BaseCode\Interfaces\IRepository;
use App\CouponApp\BaseCode\Requests\BaseRequest;
use App\CouponApp\Modules\Categories\Api\Requests\CategoryShowRequest;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\QueryBuilder;

abstract class BaseService
{
    protected $repository;
    private array $errors = [];

    public function __construct(IRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all(BaseRequest $request)
    {
        $response = $this->response();
        if (request('listing'))
            return $response->setData($this->repository->minimalListWithFilter())->setStatusCode(200);
        return $response->setData($this->repository->all())->setStatusCode(200);
    }

    public function find(BaseRequest $request, $id)
    {
        return $this->response()->setData($this->repository->find($id))->setStatusCode(200);
    }

    public function create(BaseRequest $request, array $data)
    {
        return $this->response()->setData($this->repository->create($data))->setStatusCode(200);
    }

    public function update(BaseRequest $request, array $data, $id)
    {
        return $this->response()->setData($this->repository->update($data, $id))->setStatusCode(200);

    }

    public function delete(BaseRequest $request, $id)
    {
        return $this->response()->setData($this->repository->delete($id))->setStatusCode(204);
    }

    public function findByField($field, $value, $extraConditions = [])
    {
        return $this->response()->setData($this->repository->findByField($field, $value, $extraConditions))->setStatusCode(200);
    }

    protected function response($statusCode = HttpStatus::HTTP_OK): Response|JsonResponse
    {
        return (new Response($statusCode))
            ->setErrors($this->getErrors());
    }


    public function setMessageResponse($message, $status = HttpStatus::HTTP_ERROR)
    {
        return $this->response()
            ->setData(['message' => $message])
            ->setMessage($message)
            ->setStatusCode($status)->json();
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @param array $errors
     */
    public function setErrors(array $errors): void
    {
        $this->errors = $errors;
    }

    /**
     * @param string $error
     */
    public function setError(string $error): void
    {
        $this->errors[] = $error;
    }


}
