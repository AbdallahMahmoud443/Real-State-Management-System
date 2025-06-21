<?php

namespace App\Services\Properties\Locations\contracts;



interface LocationServiceContract
{
    /**
     * Get all pricing packages
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function fetchLocations();
    /**
     * Get all pricing packages
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function fetchOneLocation(int $id);
    /**
     * Create a new pricing package
     *
     * @param array $data
     * @return \App\Models\Location
     */
    public function createLocation(array $data);
    /**
     * Update a pricing package
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Location
     */
    public function updateLocation(int $id, array $data);
    /**
     * Delete a pricing package
     *
     * @param int $id
     * @return bool
     */
    public function deleteLocation(int $id);
    /**
     * update profile Image
     * @param File $image
     * @return void
     */
    public function uploadImageLocation($image);
    /**
     * update profile Image
     * @param File $image
     * @return void
     */
    public function updateImageLocation($image, int $id);
}
