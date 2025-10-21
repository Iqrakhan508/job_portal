<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

trait ImageUploadTrait 
{
    // Upload + Resize
    public function uploadAndResizeImage($file, $fileName, $path)
    {
        // Original image store
        $file->storeAs('public/' . $path, $fileName);

        // Resize sizes from .env
        $smallWidth  = env('IMAGE_SMALL_WIDTH', 100);
        $smallHeight = env('IMAGE_SMALL_HEIGHT', 100);
        $mediumWidth = env('IMAGE_MEDIUM_WIDTH', 300);
        $mediumHeight = env('IMAGE_MEDIUM_HEIGHT', 300);

        // Small
        $small = Image::read($file)->resize($smallWidth, $smallHeight);
        $small->save(storage_path('app/public/' . $path . '/small/' . $fileName));

        // Medium
        $medium = Image::read($file)->resize($mediumWidth, $mediumHeight);
        $medium->save(storage_path('app/public/' . $path . '/medium/' . $fileName));

        return $fileName;
    }

    // Delete
    public function deleteImage($fileName, $path)
    {
        Storage::delete('public/' . $path . '/' . $fileName);
        Storage::delete('public/' . $path . '/small/' . $fileName);
        Storage::delete('public/' . $path . '/medium/' . $fileName);
    }
}
