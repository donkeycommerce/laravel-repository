<?php

namespace DonkeyCommerce\Repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RepositoryManager
{
    /**
     * Indicates if operation works with one or multiple resource.
     *
     * @var boolean
     */
    private $multiple = false;
    
    /**
     * The repository to use.
     *
     * @var Repository
     */
    private $repository;

    /**
     * A resource.
     */
    private $resource;

    /**
     * A resources collection.
     *
     * @var Illuminate\Database\Eloquent\Collection
     */
    private $resources;

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

    /**
     * Get a resource.
     *
     * @param int $index
     *
     * @return array|mixed
     */
    public function getResource($index = 0)
    {
        return $this->isMultiple()
                     ? $this->resources[$index]
                     : $this->resource;
    }

    /**
     * Set a resource.
     *
     * @param $resource
     * @return  self
     */
    public function setResource($resource): self
    {
        $this->resource = $resource;

        return $this;
    }

    /**
     * Get a resources collection.
     */
    public function getResources()
    {
        return $this->isMultiple()
                     ? $this->resources
                     : new Collection([$this->resource]);
    }

    /**
     * Set a resources collection.
     *
     * @param $resources
     * @return  self
     */
    public function setResources($resources): self
    {
        $this->resources = $resources;

        return $this;
    }

    /**
     * Check if operation works with one or multiple resource.
     *
     * @return  boolean
     */
    public function isMultiple(): bool
    {
        return $this->multiple;
    }

}