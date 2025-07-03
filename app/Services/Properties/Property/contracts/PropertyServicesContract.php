<?php

namespace App\Repositories\Properties\property\contract;

use App\Models\Property;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;


interface PropertyServicesContract
{

    /**
     * Retrieve all properties.
     * @return Collection<int, Property>
     */
    public function getAllProperties(): Collection;

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
     * Update an existing property.
     *
     * @param int $id The ID of the property to update.
     * @param array $data The data to update the property with.
     * @return bool
     */
    public function updateProperty($id, $data): bool;
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
