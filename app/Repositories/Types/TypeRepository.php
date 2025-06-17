<?php

namespace App\Repositories\Types;

use App\Models\Type;
use App\Repositories\Types\contract\TypeContract;

class TypeRepository implements TypeContract
{
    /**
     * Get all pricing packages
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function fetchALL()
    {
        return Type::all();
    }


    /**
     * Get all pricing packages
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function fetchOne(int $id)
    {
        return Type::findOrFail($id);
    }

    /**
     * Create a new pricing package
     *
     * @param array $data
     * @return \App\Models\Type
     */

    public function create(array $data)
    {
        return Type::create($data);
    }
    /**
     * Update a pricing package
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data)
    {
        $type = $this->fetchOne($id);
        return  $type->update($data);
    }

    /**
     * Delete a pricing package
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id)
    {
        $type = $this->fetchOne($id);
        return  $type->delete();
    }
}
