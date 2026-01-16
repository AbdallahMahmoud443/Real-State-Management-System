<?php

namespace App\Services\Properties\Locations\contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface LocationServiceContract
{

    public function fetchLocations();
    public function fetchOneLocation(int $id);
    public function fetchLocationsWithPropertiesCount(): Collection;
    public function fetchSomeLocations(int $limit): Collection;
    public function fetchLocationBySlug(string $slug): Model;
    public function createLocation(array $data);
    public function updateLocation(int $id, array $data);
    public function deleteLocation(int $id);
    public function uploadImageLocation($image);
    public function updateImageLocation($image, int $id);
}
