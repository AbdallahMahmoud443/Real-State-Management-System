<?php

namespace App\Repositories\Properties\property\contract;

use App\Models\Property;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface PropertyRepoContract
{
    /**
     * Retrieve all properties.
     *
     * @return Collection<int, Property>
     */
    public function getAllProperties(): Collection;

    /**
     * Retrieve a property by its ID.
     *
     * @param int $id The ID of the property.
     * @return Property|null
     */
    public function getPropertyById(int $id): ?Property;
    /**
     * Retrieve a limited number of properties.
     *
     * @param int $limit The maximum number of properties to retrieve.
     * @return Collection<int, Property>
     */
    public function getSomeOfProperties(int $limit): Collection;
    /**
     * Create a new property.
     *
     * @param array $data The data for the new property.
     * @return Property
     */
    public function createProperty(array $data): Property;

    /**
     * Update an existing property.
     *
     * @param int $id The ID of the property to update.
     * @param array $data The data to update the property with.
     * @return Property|null
     */
    public function updateProperty(int $id, array $data): ?Property;

    /**
     * Delete a property by its ID.
     *
     * @param int $id The ID of the property to delete.
     * @return bool
     */
    public function deleteProperty(int $id): bool;

    /**
     * Retrieve properties associated with a specific agent.
     *
     * @param int $id The ID of the agent.
     * @return Collection<int, Property>|null
     */
    public function getPropertiesByAgentId(int $id): ?Collection;
    /**
     * Retrieve a property by its slug.
     *
     * @param string $slug The slug of the property.
     * @return Property
     */
    public function getPropertyBySlug(string $slug): ?Property;
    /**
     * retrieve related property based on type
     *@param string $type
     * @return Collection<int, Property>
     */
    public function getRelatedPropertiesByType(string $type, string $slug, int $limit): ?Collection;
    /**
     * retrieve related property based on location
     * @param string $location_id The ID of the location.
     * @param int $pageSize The number of items per page.
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getRelatedPropertiesByLocation(string $location_id, int $pageSize): LengthAwarePaginator;
}
