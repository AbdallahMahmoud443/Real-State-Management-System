<?php

namespace App\Repositories\Properties\video;

use App\Models\Video;
use App\Repositories\Properties\video\contract\VideoRepoContract;
use Illuminate\Database\Eloquent\Collection;

class VideoRepo implements VideoRepoContract
{
    /**
     * Retrieve all videos.
     *
     * @return Collection<int, Video>
     */
    public function getAllVideosByPropertySlug(string $slug): Collection
    {
        return Video::where('slug', $slug)->orderBy('created_at', 'desc')->get();
    }

    /**
     * Retrieve a video by its ID.
     *
     * @param int $id The ID of the video.
     * @return Video|null
     */
    public function getVideoById(int $id): ?Video
    {
        return Video::findOrFail($id);
    }

    /**
     * Create a new video.
     *
     * @param array<string, mixed> $data The data for the new video.
     * @return Video
     */
    public function createVideo(array $data): Video
    {
        return Video::create($data);
    }
    /**
     * Delete a video by its ID.
     *
     * @param int $id The ID of the video to delete.
     * @return bool
     */
    public function deleteVideo(int $id): bool
    {
        return Video::destroy($id) > 0;
    }
}
