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
    public function getAllImageGalleriesByPropertySlug(string $slug): Collection
    {
        return ImagesGallery::where('slug', $slug)->orderBy('id', 'desc')->get();
    }
    public function getImageGalleryById(string $id): ?ImagesGallery
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
     * Delete an image gallery by its ID.
     *
     * @param int $id The ID of the image gallery to delete.
     * @return bool
     */
    public function deleteImagesGallery(string $id): bool
    {
        return ImagesGallery::destroy($id) > 0;
    }
}
