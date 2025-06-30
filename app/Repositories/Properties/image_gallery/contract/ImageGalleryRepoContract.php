<?php

namespace App\Repositories\Properties\image_gallery\contract;

use App\Models\ImagesGallery;
use Illuminate\Database\Eloquent\Collection;

interface ImagesGalleryRepoContract
{
    /**
     * Retrieve all image galleries.
     *
     * @return Collection<int, ImagesGallery>
     */
    public function getAllImageGalleries(): Collection;

    /**
     * Retrieve an image gallery by its ID.
     *
     * @param int $id The ID of the image gallery.
     * @return ImagesGallery|null
     */
    public function getImagesGalleryById(int $id): ?ImagesGallery;

    /**
     * Create a new image gallery.
     *
     * @param array<string, mixed> $data The data for the new image gallery.
     * @return ImagesGallery
     */
    public function createImagesGallery(array $data): ImagesGallery;

    /**
     * Update an existing image gallery.
     *
     * @param int $id The ID of the image gallery to update.
     * @param array<string, mixed> $data The data to update the image gallery with.
     * @return ImagesGallery|null
     */
    public function updateImagesGallery(int $id, array $data): ?ImagesGallery;

    /**
     * Delete an image gallery by its ID.
     *
     * @param int $id The ID of the image gallery to delete.
     * @return bool
     */
    public function deleteImagesGallery(int $id): bool;
}
