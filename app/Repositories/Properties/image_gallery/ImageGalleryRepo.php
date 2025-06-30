<?php

namespace App\Repositories\Properties\image_gallery;

use App\Models\ImagesGallery;
use App\Repositories\Properties\image_gallery\contract\ImagesGalleryRepoContract;
use Illuminate\Database\Eloquent\Collection;

class ImagesGalleryRepo implements ImagesGalleryRepoContract
{
    /**
     * Retrieve all image galleries.
     *
     * @return Collection<int, ImagesGallery>
     */
    public function getAllImageGalleries(): Collection
    {
        return ImagesGallery::all();
    }

    /**
     * Retrieve an image gallery by its ID.
     *
     * @param int $id The ID of the image gallery.
     * @return ImagesGallery|null
     */
    public function getImagesGalleryById(int $id): ?ImagesGallery
    {
        return ImagesGallery::findOrFail($id);
    }

    /**
     * Create a new image gallery.
     *
     * @param array<string, mixed> $data The data for the new image gallery.
     * @return ImagesGallery
     */
    public function createImagesGallery(array $data): ImagesGallery
    {
        return ImagesGallery::create($data);
    }

    /**
     * Update an existing image gallery.
     *
     * @param int $id The ID of the image gallery to update.
     * @param array<string, mixed> $data The data to update the image gallery with.
     * @return ImagesGallery|null
     */
    public function updateImagesGallery(int $id, array $data): ?ImagesGallery
    {
        $imagesGallery = $this->getImagesGalleryById($id);
        $imagesGallery?->update($data);

        return $imagesGallery;
    }

    /**
     * Delete an image gallery by its ID.
     *
     * @param int $id The ID of the image gallery to delete.
     * @return bool
     */
    public function deleteImagesGallery(int $id): bool
    {
        return ImagesGallery::destroy($id) > 0;
    }
}
