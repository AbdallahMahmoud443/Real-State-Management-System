<?php

namespace App\Services\Properties\Types;

use App\Repositories\Properties\Types\contract\TypeContract;
use App\Services\Properties\Types\contracts\TypeServiceContract;

class TypeServices implements TypeServiceContract
{
    public function __construct(protected TypeContract $typeRepo) {}
    /**
     * Get all pricing packages
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function fetchTypes()
    {
        return $this->typeRepo->fetchALL();
    }
    /**
     * Get all pricing packages
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function fetchOneType(int $id)
    {
        return $this->typeRepo->fetchOne($id);
    }
    /**
     * Create a new pricing package
     *
     * @param array $data
     * @return \App\Models\Type
     */
    public function createType(array $data)
    {
        return $this->typeRepo->create($data);
    }
    /**
     * Update a pricing package
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateType(int $id, array $data)
    {
        return $this->typeRepo->update($id, $data);
    }
    /**
     * Delete a pricing package
     *
     * @param int $id
     * @return bool
     */
    public function deleteType(int $id)
    {
        return $this->typeRepo->delete($id);
    }
}
