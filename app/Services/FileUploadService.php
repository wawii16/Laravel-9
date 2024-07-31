<?php

namespace App\Services;

use App\Repositories\MarketRepository;

use Illuminate\Support\Facades\File;

class FileUploadService
{
    public function uploadPhoto($photo)
    {
        $filePath = public_path('uploads');
        $file_name = time() . '_' . $photo->getClientOriginalName();
        $photo->move($filePath, $file_name);

        return $file_name;
    }

    public function deletePhoto($data, $id)
    {
        $delete = $this->marketRepository->getMarketById($id);
        File::delete(public_path('uploads/' . $data[photo]));
        $delete->delete();
    }
}
