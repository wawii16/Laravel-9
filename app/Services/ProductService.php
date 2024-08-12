<?php

namespace App\Services;

use App\Repositories\ProductRepositoryInterface;
use App\Services\FileUploadService;

class ProductService
{
    public function __construct(
        protected ProductRepositoryInterface $productRepository,
        protected FileUploadService $fileUploadService
    ) {}

    public function getAllProducts()
    {
        return $this->productRepository->getAllProducts();
    }

    public function getProductById($id)
    {
        return $this->productRepository->getProductById($id);
    }
    public function create(array $data)
    {
        // Handle file upload
        $file_name = $this->fileUploadService->uploadPhoto($data['photo']);
        $data['photo'] = $file_name;
        return $this->productRepository->create($data);
    }



    public function update(array $data, $id)
    {
        // Fetch the current product data
        $currentProduct = $this->productRepository->getProductById($id);


        // Handle file upload for updates
        if (isset($data['photo'])) {
            // Delete the old photo file
            $this->fileUploadService->deletePhoto($currentProduct->photo, $id);

            // Upload the new photo file
            $file_name = $this->fileUploadService->uploadPhoto($data['photo']);
            $data['photo'] = $file_name;
        }

        return $this->productRepository->update($data, $id);
    }




    public function delete($id)
    {
        // Retrieve the current product record
        $currentProduct = $this->productRepository->getProductById($id);

        if ($currentProduct && isset($currentProduct->photo)) {
            // Delete the old photo file
            $this->fileUploadService->deletePhoto($currentProduct->photo);
        }
        return $this->productRepository->delete($id);
    }
}
