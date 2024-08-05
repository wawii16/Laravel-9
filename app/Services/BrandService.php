<?php

namespace App\Services;

use App\Repositories\BrandRepositoryInterface;
use App\Services\FileUploadService;

class BrandService
{
    public function __construct(
        protected BrandRepositoryInterface $brandRepository,
        protected FileUploadService $fileUploadService
    ) {
    }

    public function getAllBrands()
    {
        return $this->brandRepository->getAllBrands();
    }

    public function getBrandById($id)
    {
        return $this->brandRepository->getBrandById($id);
    }
    public function create(array $data)
    {
        // Handle file upload
        $file_name = $this->fileUploadService->uploadPhoto($data['photo']);
        $data['photo'] = $file_name;
        return $this->brandRepository->create($data);
    }



    public function update(array $data, $id)
    {
        // Fetch the current brand data
        $currentBrand = $this->brandRepository->getBrandById($id);

        // Handle file upload for updates
        if (isset($data['photo'])) {
            // Delete the old photo file
            $this->fileUploadService->deletePhoto($currentBrand->photo, $id);

            // Upload the new photo file
            $file_name = $this->fileUploadService->uploadPhoto($data['photo']);
            $data['photo'] = $file_name;
        }

        return $this->brandRepository->update($data, $id);
    }




    public function delete($id)
    {
        // Retrieve the current brand record
        $currentBrand = $this->brandRepository->getBrandById($id);

        if ($currentBrand && isset($currentBrand->photo)) {
            // Delete the old photo file
            $this->fileUploadService->deletePhoto($currentBrand->photo);
        }
        return $this->brandRepository->delete($id);
    }
}
