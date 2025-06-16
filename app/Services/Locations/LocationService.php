<?php

namespace App\Services\Locations;

use App\Repositories\Locations\contracts\locationsContract;
use App\Services\Locations\contracts\LocationServiceContract;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class LocationService implements LocationServiceContract
{
    public function __construct(protected locationsContract $locationsContractRepo) {}

    public function fetchLocations()
    {
        return $this->locationsContractRepo->fetchALL();
    }
    public function fetchOneLocation(int $id)
    {
        return $this->locationsContractRepo->fetchOne($id);
    }
    public function createLocation(array $data)
    {
        if (isset($data['photo'])) {
            $path = $this->uploadImageLocation($data['photo']);
            $data['photo'] = $path;
        }
        return $this->locationsContractRepo->create($data);
    }
    public function updateLocation(int $id, array $data)
    {
        return $this->locationsContractRepo->update($id, $data);
    }
    public function deleteLocation(int $id)
    {
        $location = $this->fetchOneLocation($id);
        if ($location->photo != null) {
            File::delete(public_path($location->photo));
        }
        return $this->locationsContractRepo->delete($id);
    }
    public function uploadImageLocation($image)
    {
        $customFileName = 'location_' . Str::uuid()  .  $image->getClientOriginalExtension();
        $path = $image->storeAs('/location/', $customFileName, 'public');
        $path = '/uploads/' . $path;
        return $path;
    }
    public function updateImageLocation($image, int $id)
    {
        $location = $this->fetchOneLocation($id);
        if ($location->photo != null) {
            File::delete(public_path($location->photo));
        }
        $path = $this->uploadImageLocation($image);
        $this->locationsContractRepo->UploadImage(['path' =>  $path], $location);
    }
}
