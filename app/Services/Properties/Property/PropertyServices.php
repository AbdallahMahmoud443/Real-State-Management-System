<?php

namespace App\Services\Properties\Property;

use App\Services\Properties\Property\contracts\PropertyServicesContract;
use App\Mail\EnquiryProperty;
use App\Models\Property;
use App\Repositories\Properties\property\contract\PropertyRepoContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class PropertyServices implements PropertyServicesContract
{

    public function __construct(protected PropertyRepoContract $propertyRepo) {}

    public function fetchPropertiesByAgentId(int $agentId): Collection
    {
        return $this->propertyRepo->getPropertiesByAgentId($agentId);
    }
    public function fetchAllProperties(): Collection
    {
        return $this->propertyRepo->getAllProperties();
    }
    public function fetchPropertyById($id): ?Property
    {
        return $this->propertyRepo->getPropertyById($id);
    }
    public function fetchAmenitiesOfProperty(Property $property): array
    {
        $Property_amenities = [];
        foreach ($property->amenities as $amenity) {
            $Property_amenities[] = $amenity->id;
        }
        return $Property_amenities;
    }
    public function fetchPropertyBySlug(string $slug): ?Property
    {
        return $this->propertyRepo->getPropertyBySlug($slug);
    }
    public function fetchSomeOfProperties(int $limit): Collection
    {
        return $this->propertyRepo->getSomeOfProperties($limit);
    }
    public function fetchRelatedPropertiesByType(string $type, string $slug, int $limit): Collection
    {
        return $this->propertyRepo->getRelatedPropertiesByType($type, $slug, $limit);
    }
    public function fetchRelatedPropertiesByLocation(string $location_id, int $pageSize): LengthAwarePaginator
    {
        return $this->propertyRepo->getRelatedPropertiesByLocation($location_id, $pageSize);
    }
    public function uploadCoverImageOfProperty(UploadedFile $cover, string $agentId): string
    {
        $CustomFileName =  Str::uuid() . '_cover.' . $cover->extension();
        $coverPath = 'properties/' . 'agent_' . $agentId . '/covers';
        $finalPath = Storage::disk('public')->putFileAs($coverPath, $cover, $CustomFileName);
        return '/uploads/' . $finalPath;
    }
    public function UpdateCoverImageOfProperty(UploadedFile $cover, string $agentId, string $PropertyId): string
    {
        $old_cover = $this->fetchPropertyById($PropertyId)->cover;
        if (!empty($old_cover) && Str::startsWith($old_cover, '/uploads/')) {
            // hint to delete item put path after upload folder
            Storage::disk('public')->delete(Str::after($old_cover, '/uploads/'));
        }
        $CustomFileName =  Str::uuid() . '_cover.' . $cover->extension();
        $coverPath = 'properties/' . 'agent_' . $agentId . '/covers';
        $finalPath = Storage::disk('public')->putFileAs($coverPath, $cover, $CustomFileName);
        return '/uploads/' . $finalPath;
    }
    public function createProperty(array $data): Property
    {
        $agent = Auth::guard('agent')->user();
        $data['agent_id'] = $agent->id;
        if (isset($data['cover']) && $data['cover'] instanceof UploadedFile) {
            $data['cover'] = $this->uploadCoverImageOfProperty($data['cover'], $agent->id);
        }
        $property = $this->propertyRepo->createProperty($data);
        if (!empty($data['amenities'])) {
            $property->amenities()->attach($data['amenities']);
        }
        return $property;
    }
    public function updateProperty(string $id, array $data): Property
    {
        $agent = Auth::guard('agent')->user();
        if (isset($data['cover']) && $data['cover'] instanceof UploadedFile) {
            $data['cover'] = $this->UpdateCoverImageOfProperty($data['cover'], $agent->id, $id);
        }
        $property = $this->propertyRepo->updateProperty($id, $data);
        if (!empty($data['amenities'])) {
            $property->amenities()->sync($data['amenities']);
        } else {
            $property->amenities()->sync([]);
        }
        return $property;
    }
    public function deleteProperty($id): bool
    {
        $property = $this->fetchPropertyById($id);
        $is_deleted = $this->propertyRepo->deleteProperty($id);
        if ($is_deleted && $property->cover && Str::startsWith($property->cover, '/uploads/')) {
            Storage::disk('public')->delete(Str::after($property->cover, '/uploads/'));
        }
        return $is_deleted;
    }
    public function sendEnquiryMail(array $data, string $slug)
    {
        $property = $this->fetchPropertyBySlug($slug);
        $agentMail = $property->agent->email;
        $message = Mail::to($agentMail)->send(new EnquiryProperty($data,  $property));
        if ($message != null) return true;
        return false;
    }
    public function fetchRelatedPropertiesByAgent(string $agent_id, int $limit): Collection
    {
        return $this->propertyRepo->getRelatedPropertiesByAgent($agent_id, $limit);
    }
}
