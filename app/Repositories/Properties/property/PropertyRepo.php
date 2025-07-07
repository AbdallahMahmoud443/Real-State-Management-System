<?php

namespace App\Repositories\Properties\property;

use App\Models\Property;
use App\Repositories\Properties\property\contract\PropertyRepoContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PropertyRepo implements PropertyRepoContract
{
    /**
     * Retrieve all properties.
     *
     * @return Collection<int, Property>
     */
    public function getAllProperties(): Collection
    {
        return Property::all();
    }
    /**
     * Retrieve a limited number of properties.
     *
     * @param int $limit The maximum number of properties to retrieve.
     * @return Collection<int, Property>
     */
    public function getSomeOfProperties(int $limit): Collection
    {
        return Property::with(['types', 'location', 'agent'])
            ->where('is_active', '1')
            ->orderBy('id', 'desc')
            ->limit($limit)
            ->get();
    }
    /**
     * Retrieve a property by its ID.
     *
     * @param int $id The ID of the property.
     * @return Property|null
     */
    public function getPropertyById(int $id): ?Property
    {
        return Property::findOrFail($id);
    }
    /**
     * Create a new property.
     *
     * @param array $data The data for the new property.
     * @return Property
     */
    public function createProperty(array $data): Property
    {
        return Property::create($data);
    }
    /**
     * Update an existing property.
     *
     * @param int $id The ID of the property to update.
     * @param array $data The data to update the property with.
     * @return Property|null
     */
    public function updateProperty(int $id, array $data): ?Property
    {
        $property = $this->getPropertyById($id);
        if ($property) {
            $property->update($data);
        }
        return $property;
    }
    /**
     * Delete a property by its ID.
     *
     * @param int $id The ID of the property to delete.
     * @return bool
     */
    public function deleteProperty(int $id): bool
    {
        return Property::destroy($id) > 0;
    }
    public function getPropertiesByAgentId(int $id): ?Collection
    {
        return Property::where('agent_id', $id)->get();
    }
    public function getPropertyBySlug(string $slug): ?Property
    {
        return Property::where('slug', $slug)->first();
    }
    public function getRelatedPropertiesByType(string $type, string $slug, int $limit): ?Collection
    {
        return Property::where('type_id', $type)
            ->where('is_active', '1')
            ->where('slug', '!=', $slug)
            ->limit($limit)->get();
    }
    public function getRelatedPropertiesByLocation(string $location_id, int $pageSize): LengthAwarePaginator
    {
        return Property::with(['types', 'location', 'agent'])
            ->where('location_id', $location_id)
            ->where('is_active', '1')
            ->orderBy('id', 'desc')
            ->paginate($pageSize);
    }
}
