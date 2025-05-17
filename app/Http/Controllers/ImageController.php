<?php

namespace App\Http\Controllers;

use App\Models\ImageList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Encoders\WebpEncoder;
use Intervention\Image\ImageManager;

class ImageController extends Controller
{
    public function convertToWebp(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,jpg,png,gif,webp|max:6000',
        ]);

        $imageManager = new ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
        $savedImages = [];

        foreach ($request->file('images') as $image) {
            $uniqueName = Str::uuid()->toString() . '.webp';
            $webpPath = public_path('images/webp/' . $uniqueName);

            if (!file_exists(dirname($webpPath))) {
                mkdir(dirname($webpPath), 0755, true);
            }

            $imageManager->read($image->getPathname())
                ->encode(new WebpEncoder(quality: 80))
                ->save($webpPath);

            // Save to DB
            ImageList::create([
                'user_id' => $user->id,
                'image_name' => $uniqueName,
            ]);

            $savedImages[] = asset('images/webp/' . $uniqueName);
        }

        return redirect()->back()->with([
            'success' => 'Images converted successfully!',
            'webp_urls' => $savedImages,
        ]);
    }

}
