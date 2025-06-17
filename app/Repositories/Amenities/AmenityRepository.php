<?php

namespace App\Repositories\Amenities;

use App\Models\Amenity;
use App\Repositories\Amenities\contract\AmenityContract;

class AmenityRepository implements AmenityContract
{
    /**
     * Get all pricing packages
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function fetchALL()
    {
        return Amenity::all();
    }


    /**
     * Get all pricing packages
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function fetchOne(int $id)
    {
        return Amenity::findOrFail($id);
    }
    /**
     * Create a new pricing package
     *
     * @param array $data
     * @return \App\Models\Type
     */

    public function create(array $data)
    {
        return Amenity::create($data);
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
        $Amenity = $this->fetchOne($id);
        return  $Amenity->update($data);
    }

    /**
     * Delete a pricing package
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id)
    {
        $Amenity = $this->fetchOne($id);
        return  $Amenity->delete();
    }
}
