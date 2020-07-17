<?php

namespace DonkeyCommerce\Repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RepositoryManager
{
    /**
     * The repository to use.
     *
     * @var Repository
     */
    private $repository;

    /**
     * Get a repository.
     *
     * @param string $name
     */
    public function __construct($name)
    {
        $this->repository = app()->make(
            'App\\Repositories\\' . Str::studly($name) . 'Repository'
        );
    }

    /**
     * Undocumented function
     *
     * @param  string $method
     * @param  mixed  $params
     * @return void
     */
    public function __call($method, $params)
    {
        $result = $this->repository->$method(...$params);

        if ($result instanceof Collection) {
            $this->setResources($result);
        } else if (is_subclass_of($result, Model::class)) {
            $this->setResource($result);
        } else {
            $result = $this;
        }

        return $result;
    }
}