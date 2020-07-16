<?php

namespace DonkeyCommerce\Repository\Contracts;

use Illuminate\Database\Eloquent\Model;

interface CrudRepository
{
    /**
     * Create a resource
     *
     * @param  array $data
     * @return Model
     */
    public function create($data);

    /**
     * Delete a resource
     *
     * @param  string|int $id
     * @return void
     */
    public function delete($id);

    /**
     * Find resource/s by id or ids
     *
     * @param [type] $ids
     * @return Model
     */
    public function find($ids);

    /**
     * Get all resources
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function get();

    /**
     * Update a resource.
     *
     * @param string $id   The id of resource
     * @param array  $data The data to update
     * @return void
     */
    public function update($id, $data);
}
