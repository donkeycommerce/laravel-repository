<?php

namespace DonkeyCommerce\Repository;

use ReflectionClass;
use Illuminate\Support\Str;

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
    public function __construct($model = null)
    {
        if ($model) {
            $this->model = $model;
        } else {
            $model = 'App\Models\\' . Str::studly($this->getName());
            $this->model = new $model;
        }
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

    /**
     * Get name of repository.
     *
     * @return void
     */
    public function getName($toLower = true)
    {
        $name = str_replace('Repository', '', (new ReflectionClass($this))->getShortName());

        if ($toLower) {
            return strtolower($name);
        }

        return $name;
    }

    /**
     * Get per page value.
     *
     * @return void
     */
    public function getPerPage()
    {
        return request()->perPage;
    }
}
