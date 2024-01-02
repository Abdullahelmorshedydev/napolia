<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

trait FilesTrait
{
    public static function store(UploadedFile $file, string $publicStoragePath): string
    {
        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $destinationPath = public_path($publicStoragePath);
        $file->move($destinationPath, $fileName);

        return $publicStoragePath . $fileName;
    }

    public static function delete(string $path)
    {
        if (File::exists(public_path($path))) {
            File::delete(public_path($path));
            return true;
        }
        return false;
    }
}
