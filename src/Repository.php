<?php

namespace DonkeyCommerce\Repository;

use Illuminate\Database\Eloquent\Collection;

/**
 * The base class representing a repository.
 */
class Repository
{
    /**
     * A resource.
     */
    private $resource;

    /**
     * A resources collection.
     *
     * @var Collection
     */
    private $resources;

    /**
     * The model in use.
     *
     * @var
     */
    protected $model;

    /**
     * Indicates if operation works with one or multiple resource.
     *
     * @var boolean
     */
    private $multiple = false;

    /**
     * Resolve ims id on initialization.
     *
     * @param  $model
     */
    public function __construct($model)
    {
        $this->model = $model;
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
}
