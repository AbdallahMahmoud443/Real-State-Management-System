<?php

namespace App\Services\Properties\PhotosGallery\contract;

use App\Models\ImagesGallery;
use App\Models\Property;
use Illuminate\Http\UploadedFile;

interface PhotosGalleryServiceContract
{
    public function upload(UploadedFile $photos, Property $property): ImagesGallery;
    public function storeImage(string $path, string $propertyId): ImagesGallery;
    public function deleteImage(string $id): bool;
}
