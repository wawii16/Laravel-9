<?php

namespace App\Services;

use App\Repositories\BrandRepositoryInterface;

use Illuminate\Support\Facades\File;

class FileUploadService
{
    public function __construct(
        protected BrandRepositoryInterface $brandRepository,
    ) {
    }
    public function uploadPhoto($photo)
    {
        $filePath = public_path('uploads');
        $file_name = time() . '_' . $photo->getClientOriginalName();
        $photo->move($filePath, $file_name);

        return $file_name;
    }

    public function deletePhoto($fileName)
    {
        $filePath = public_path('uploads/' . $fileName);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }
    }
}
