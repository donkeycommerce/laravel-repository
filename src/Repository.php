<?php

namespace DonkeyCommerce\Repository;

/**
 * The base class representing a repository.
 */
class Repository
{
    /**
     * The model in use.
     *
     * @var
     */
    protected $model;

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
     * Get current model.
     *
     * @return void
     */
    public function getModel()
    {
        return $this->model;
    }   
}
