<?php

namespace App\Services\Properties\Video\contract;

use App\Models\Video;
use Illuminate\Database\Eloquent\Collection;

interface VideoServiceContract
{
    public function getAllVideosByPropertySlug(string $slug): Collection;

    public function getVideoById(int $id): ?Video;

    public function createVideo(array $data): Video;

    public function deleteVideo(int $id): bool;
}
