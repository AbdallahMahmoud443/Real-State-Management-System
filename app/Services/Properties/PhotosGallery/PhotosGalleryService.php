<?php

namespace App\Services\Properties\PhotosGallery;


use App\Models\ImagesGallery;
use App\Models\Property;
use App\Repositories\Properties\image_gallery\contract\ImagesGalleryRepoContract;
use App\Services\Properties\PhotosGallery\contract\PhotosGalleryServiceContract;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

use App\Services\Properties\Property\PropertyServices;
use Illuminate\Support\Facades\Storage;

class PhotosGalleryService implements PhotosGalleryServiceContract
{
    public function __construct(protected ImagesGalleryRepoContract $imagesGalleryRepo, protected PropertyServices $propertyServices) {}

    public function storeImage(string $path, string $propertyId): ImagesGallery
    {
        return $this->imagesGalleryRepo->createImagesGallery([
            'property_id' => $propertyId,
            'image' => '/uploads/' . $path,
        ]);
    }
    public function upload(UploadedFile $photo, Property $property): ImagesGallery
    {

        $customFileName = Str::uuid() . '_photo.' . $photo->getClientOriginalExtension();
        $photoPath = 'properties/' . 'agent_' . $property->agent_id . '/properties/' . $property->id . '/photos';
        $finalPath = $photo->storeAs($photoPath, $customFileName, 'public');
        return $this->storeImage($finalPath, $property->id);
    }

    public function deleteImage(string $id): bool
    {
        $image = $this->imagesGalleryRepo->getImageGalleryById($id)->image;
        if (!empty($image)) {
            $is_deleted =  Storage::disk('public')->delete(Str::after($image, '/uploads/'));
        }
        if (!$is_deleted) {
            return false;
        }
        return $this->imagesGalleryRepo->deleteImagesGallery($id);
    }
}
