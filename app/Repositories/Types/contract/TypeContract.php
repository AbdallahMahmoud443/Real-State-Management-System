<?php

namespace App\Repositories\Types\contract;

use Illuminate\Database\Eloquent\Model;


interface TypeContract
{
    /**
     * Get all pricing packages
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function fetchALL();


    /**
     * Get all pricing packages
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function fetchOne(int $id);
    /**
     * Create a new pricing package
     *
     * @param array $data
     * @return \App\Models\Type
     */

    public function create(array $data);

    /**
     * Update a pricing package
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Type
     */
    public function update(int $id, array $data);

    /**
     * Delete a pricing package
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id);
}
