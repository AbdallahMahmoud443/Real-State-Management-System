<?php

namespace App\Repositories\Properties\Locations;

use App\Models\Location;

use App\Repositories\Properties\Locations\contracts\locationsContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class LocationsRepository  implements locationsContract
{
    public function fetchALL()
    {
        return Location::all();
    }
    public function fetchOne(int $id)
    {
        return Location::findOrFail($id);
    }
    public function fetchLocationWithPropertiesCount(): Collection
    {
        return Location::withCount(['properties' => function ($query) {
            $query->where('is_active', 1);
        }])->orderBy('properties_count', 'desc')->get();
    }
    public function fetchLocationBySlug(string $slug): Model
    {
        return Location::where('slug', $slug)->first();
    }
    public function fetchSomeLocation(int $limit): Collection
    {
        return Location::withCount(['properties' => function ($query) {
            $query->where('is_active', 1);
        }])->limit($limit)->orderBy('properties_count', 'desc')->get();
    }
    public function create(array $data)
    {
        return Location::create($data);
    }
    public function update(int $id, array $data)
    {
        $location = $this->fetchOne($id);
        $location->update($data);
        return $location;
    }

    public function delete(int $id)
    {
        $location = $this->fetchOne($id);
        return $location->delete();
    }
    public function UploadImage(array $image, Model $location): void
    {
        $location->photo = $image['path'];
        $location->save();
    }
}
