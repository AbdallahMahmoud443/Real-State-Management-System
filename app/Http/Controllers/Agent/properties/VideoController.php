<?php

namespace App\Http\Controllers\Agent\properties;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Services\Properties\Property\PropertyServices;
use App\Services\Properties\Video\VideoService;
use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function __construct(protected VideoService $videoServices, protected PropertyServices $propertyServices) {}

    public function showVideos(string $slug)
    {
        $property = $this->propertyServices->fetchPropertyBySlug($slug);
        return view('agent.dashboard.property.videos', compact('property'));
    }
    public function addVideo(Request $request, string $slug)
    {
        $request->validate([
            'video' => 'nullable|string'
        ]);

        $property = $this->propertyServices->fetchPropertyBySlug($slug);
        $property = $this->videoServices->createVideo(['property_id' => $property->id, 'video' => $request->input('video')]);
        if (!$property) {
            return redirect()->back()->with('error', 'Video Upload Failed');
        }
        return redirect()->back()->with('success', 'Video Upload successfully');
    }
    public function deleteVideo(int $id)
    {
        $is_deleted = $this->videoServices->deleteVideo($id);
        if (!$is_deleted) {
            return redirect()->back()->with('error', ' Video deleted Failed');
        }
        return redirect()->back()->with('success', 'Video deleted successfully');
    }
}
