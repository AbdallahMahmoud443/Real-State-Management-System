<?php

namespace App\Repositories\Properties\image_gallery\contract;

use App\Models\ImagesGallery;
use Illuminate\Database\Eloquent\Collection;

interface ImagesGalleryRepoContract
{
    /**
     * Retrieve all image galleries by property slug.
     *
     * @return Collection<int, ImagesGallery>
     */
    public function getAllImageGalleriesByPropertySlug(string $slug): Collection;
    /**
     * Retrieve Image from Image Gallery table
     * @param string $id
     * @return ?ImagesGallery
     */
    public function getImageGalleryById(string $id): ?ImagesGallery;
    /**
     * Create a new image gallery.
     *
     * @param array<string, mixed> $data The data for the new image gallery.
     * @return ImagesGallery
     */
    public function createImagesGallery(array $data): ImagesGallery;

    /**
     * Delete an image gallery by its ID.
     *
     * @param int $id The ID of the image gallery to delete.
     * @return bool
     */
    public function deleteImagesGallery(string $id): bool;
}
