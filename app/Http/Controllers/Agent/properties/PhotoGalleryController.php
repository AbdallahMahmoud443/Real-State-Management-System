<?php

namespace App\Http\Controllers\Agent\properties;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Services\Properties\PhotosGallery\PhotosGalleryService;
use App\Services\Properties\Property\PropertyServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotoGalleryController extends Controller
{
    //
    public function __construct(protected PropertyServices $propertyServices, protected PhotosGalleryService $photosGalleryService) {}
    public function showPhotos(string $slug)
    {
        $property = $this->propertyServices->fetchPropertyBySlug($slug);
        return view('agent.dashboard.property.photo_gallery', compact('property'));
    }
    public function uploadPhotos(Request $request, string $slug)
    {
        // validation data
        $request->validate([
            'photos' => 'required|array',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('photos')) {
            $property = $this->propertyServices->fetchPropertyBySlug($slug);
            foreach ($request->file('photos') as $photo) {
                $this->photosGalleryService->upload($photo, $property);
            }
            return redirect()->back()->with('success', 'Photos uploaded successfully');
        }
        return redirect()->back();
    }
    public function deletePhoto(string $id)
    {
        $is_deleted = $this->photosGalleryService->deleteImage($id);
        if (!$is_deleted) {
            return redirect()->back()->with('error', 'Deleting Photo Failed');
        }
        return redirect()->back()->with('success', 'Photo deleted successfully');
    }
}
