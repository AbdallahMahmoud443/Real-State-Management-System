<?php

namespace App\Services\Amenities;

use App\Repositories\Amenities\contract\AmenityContract;
use App\Services\Amenities\contracts\AmenityServiceContract;

class AmenityServices implements AmenityServiceContract
{
    public function __construct(protected AmenityContract $amenityRepo) {}
    /**
     * Get all pricing packages
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function fetchAmenities()
    {
        return $this->amenityRepo->fetchALL();
    }
    /**
     * Get all pricing packages
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function fetchOneAmenity(int $id)
    {
        return $this->amenityRepo->fetchOne($id);
    }
    /**
     * Create a new pricing package
     *
     * @param array $data
     * @return \App\Models\Amenity
     */
    public function createAmenity(array $data)
    {
        return $this->amenityRepo->create($data);
    }
    /**
     * Update a pricing package
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Amenity
     */
    public function updateAmenity(int $id, array $data)
    {
        return $this->amenityRepo->update($id, $data);
    }
    /**
     * Delete a pricing package
     *
     * @param int $id
     * @return bool
     */
    public function deleteAmenity(int $id)
    {
        return $this->amenityRepo->delete($id);
    }
}
