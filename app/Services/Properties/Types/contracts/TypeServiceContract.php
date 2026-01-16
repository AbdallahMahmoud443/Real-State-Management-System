<?php

namespace App\Services\Properties\Types\contracts;

interface TypeServiceContract
{
    /**
     * Get all pricing packages
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function fetchTypes();
    /**
     * Get all pricing packages
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function fetchOneType(int $id);
    /**
     * Create a new pricing package
     *
     * @param array $data
     * @return \App\Models\Type
     */
    public function createType(array $data);
    /**
     * Update a pricing package
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Type
     */
    public function updateType(int $id, array $data);
    /**
     * Delete a pricing package
     *
     * @param int $id
     * @return bool
     */
    public function deleteType(int $id);
}
