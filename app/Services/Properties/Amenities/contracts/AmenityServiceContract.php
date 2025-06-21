<?php

namespace App\Services\Properties\Amenities\contracts;



interface AmenityServiceContract
{
    /**
     * Get all pricing packages
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function fetchAmenities();
    /**
     * Get all pricing packages
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function fetchOneAmenity(int $id);
    /**
     * Create a new pricing package
     *
     * @param array $data
     * @return \App\Models\Amenity
     */
    public function createAmenity(array $data);
    /**
     * Update a pricing package
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Amenity
     */
    public function updateAmenity(int $id, array $data);
    /**
     * Delete a pricing package
     *
     * @param int $id
     * @return bool
     */
    public function deleteAmenity(int $id);
}
