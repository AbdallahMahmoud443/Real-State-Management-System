<?php

namespace App\Repositories\Properties\video\contract;

use App\Models\Video;
use Illuminate\Database\Eloquent\Collection;

interface VideoRepoContract
{
    /**
     * Retrieve all videos.
     *
     * @return Collection<int, Video>
     */
    public function getAllVideos(): Collection;

    /**
     * Retrieve a video by its ID.
     *
     * @param int $id The ID of the video.
     * @return Video|null
     */
    public function getVideoById(int $id): ?Video;

    /**
     * Create a new video.
     *
     * @param array<string, mixed> $data The data for the new video.
     * @return Video
     */
    public function createVideo(array $data): Video;

    /**
     * Update an existing video.
     *
     * @param int $id The ID of the video to update.
     * @param array<string, mixed> $data The data to update the video with.
     * @return Video|null
     */
    public function updateVideo(int $id, array $data): ?Video;

    /**
     * Delete a video by its ID.
     *
     * @param int $id The ID of the video to delete.
     * @return bool
     */
    public function deleteVideo(int $id): bool;
}
