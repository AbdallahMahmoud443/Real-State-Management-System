<?php

namespace App\Services\Properties\Video;

use App\Models\Video;
use App\Repositories\Properties\video\contract\VideoRepoContract;
use App\Services\Properties\Video\contract\VideoServiceContract;
use Illuminate\Database\Eloquent\Collection;

class VideoService implements VideoServiceContract
{
    public function __construct(protected VideoRepoContract $videoRepo) {}

    public function getAllVideosByPropertySlug(string $slug): Collection
    {
        return $this->videoRepo->getAllVideosByPropertySlug($slug);
    }

    public function getVideoById(int $id): ?Video
    {
        return $this->videoRepo->getVideoById($id);
    }

    public function createVideo(array $data): Video
    {
        return $this->videoRepo->createVideo($data);
    }

    public function deleteVideo(int $id): bool
    {
        return $this->videoRepo->deleteVideo($id);
    }
}
