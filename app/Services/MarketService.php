<?php

namespace App\Services;

use App\Repositories\MarketRepositoryInterface;
use App\Services\FileUploadService;

class MarketService
{
    public function __construct(
        protected MarketRepositoryInterface $marketRepository,
        protected FileUploadService $fileUploadService
    ) {
    }

    public function getAllMarkets()
    {
        return $this->marketRepository->getAllMarkets();
    }

    public function getMarketById($id)
    {
        return $this->marketRepository->getMarketById($id);
    }
    public function create(array $data)
    {
        // Handle file upload
        $file_name = $this->fileUploadService->uploadPhoto($data['photo']);
        $data['photo'] = $file_name;
        return $this->marketRepository->create($data);
    }



    public function update(array $data, $id)
    {
        // Fetch the current market data
        $currentMarket = $this->marketRepository->getMarketById($id);

        // Handle file upload for updates
        if (isset($data['photo'])) {
            // Delete the old photo file
            $this->fileUploadService->deletePhoto($currentMarket->photo, $id);

            // Upload the new photo file
            $file_name = $this->fileUploadService->uploadPhoto($data['photo']);
            $data['photo'] = $file_name;
        }

        return $this->marketRepository->update($data, $id);
    }




    public function delete($id)
    {
        // Retrieve the current market record
        $currentMarket = $this->marketRepository->getMarketById($id);

        if ($currentMarket && isset($currentMarket->photo)) {
            // Delete the old photo file
            $this->fileUploadService->deletePhoto($currentMarket->photo);
        }
        return $this->marketRepository->delete($id);
    }
}
