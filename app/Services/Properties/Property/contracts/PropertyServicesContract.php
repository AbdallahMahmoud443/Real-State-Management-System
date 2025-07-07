<?php

namespace App\Services\Properties\Property\contracts;

use App\Models\Property;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\File;


interface PropertyServicesContract
{

    /**
     * Retrieve all properties.
     * @return Collection<int, Property>
     */
    public function fetchAllProperties(): Collection;

    /**
     * Retrieve a property by its ID.
     *
     * @param int $id The ID of the property.
     * @return Property|null
     */
    public function fetchPropertyById($id): ?Property;
    /**
     * Fetch properties by agent ID.
     *
     * @param int $agentId The ID of the agent.
     * @return Collection<int, Property>
     */
    public function fetchPropertiesByAgentId(int $agentId): Collection;
    /**
     * Fetch a property by its slug.
     *
     * @param string $slug The slug of the property.
     * @return Property|null
     */
    public function fetchPropertyBySlug(string $slug): ?Property;
    /**
     * Fetch a limited number of properties.
     *
     * @param int $limit The maximum number of properties to fetch.
     * @return Collection<int, Property>
     */
    public function fetchSomeOfProperties(int $limit): Collection;
    /**
     *  create Property
     * @param array $data valid data
     * @return Property
     */

    public function createProperty(array $data): Property;
    /**
     * Fetch related properties by type and slug.
     *
     * @param string $type The type of the related properties.
     * @param string $slug The slug of the property.
     * @return Collection<int, Property>
     */
    public function fetchRelatedPropertiesByType(string $type, string $slug, int $limit): Collection;
    /**
     * Fetch related properties by location.
     *
     * @param string $location_id The ID of the location.
     * @param int $pageSize The number of items per page.
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function fetchRelatedPropertiesByLocation(string $location_id, int $pageSize): LengthAwarePaginator;
    /**
     * Fetch related properties by agent.
     *
     * @param string $agent_id The ID of the agent.
     * @param int $limit The maximum number of related properties to fetch.
     * @return Collection<int, Property>
     */
    public function fetchRelatedPropertiesByAgent(string $agent_id, int $limit): Collection;
    /**
     * Update an existing property.
     *
     * @param int $id The ID of the property to update.
     * @param array $data The data to update the property with.
     * @return bool
     */
    public function updateProperty(string $id, array $data): Property;
    /**
     * Delete an existing property.
     *
     * @param int $id The ID of the property to delete.
     * @return bool
     */
    public function deleteProperty($id): bool;
    /**
     * Upload a cover image for a property.
     *
     * @param File $cover The cover image file.
     * @param string $propertyName The name of the property.
     * @return string
     */
    public function uploadCoverImageOfProperty(UploadedFile $cover, string $agentId): string;
    /**
     *  Update the cover image of a property.
     *
     * @param File $cover The new cover image file.
     * @param string $propertyName The name of the property.
     * @return string
     */
    public function UpdateCoverImageOfProperty(UploadedFile $cover, string $agentId, string $PropertyId): string;
}
