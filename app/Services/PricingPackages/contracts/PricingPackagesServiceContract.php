<?php

namespace App\Services\PricingPackages\contracts;

interface PricingPackagesServiceContract
{
    /**
     * Get all pricing packages
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function fetchALLPackages();
    /**
     * Get all pricing packages
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function fetchOnePackage(int $id);
    /**
     * Create a new pricing package
     *
     * @param array $data
     * @return \App\Models\PricingPackage
     */
    public function createPackage(array $data);
    /**
     * Update a pricing package
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\PricingPackage
     */
    public function updatePackage(int $id, array $data);
    /**
     * Delete a pricing package
     *
     * @param int $id
     * @return bool
     */
    public function deletePackage(int $id);
}
