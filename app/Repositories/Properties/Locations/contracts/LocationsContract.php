<?php

namespace App\Repositories\Properties\Locations\contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


interface locationsContract
{

    public function fetchALL();
    public function fetchOne(int $id);
    public function fetchSomeLocation(int $limit): Collection;
    public function fetchLocationWithPropertiesCount(): Collection;
    public function fetchLocationBySlug(string $slug): Model;
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
    public function UploadImage(array $image, Model $location): void;
}
