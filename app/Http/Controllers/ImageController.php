<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Encoders\WebpEncoder;
use Intervention\Image\ImageManager;

class ImageController extends Controller
{
    public function convertToWebp(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,webp|max:6000',
        ]);

        $image = $request->file('image');

        $webpName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';
        $webpPath = public_path('images/webp/' . $webpName);

        // Ensure directory exists
        if (!file_exists(dirname($webpPath))) {
            mkdir(dirname($webpPath), 0755, true);
        }

        // Create ImageManager instance with GD driver
        $manager = new ImageManager(new \Intervention\Image\Drivers\Gd\Driver());

        // Convert and encode with WebpEncoder
        $manager->read($image->getPathname())
            ->encode(new WebpEncoder(quality: 80))
            ->save($webpPath);

        return redirect()->back()->with([
            'success' => 'Image converted successfully!',
            'webp_url' => asset('images/webp/' . $webpName),
        ]);
    }
}
