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

        // Handle file upload for updates
        if (isset($data['photo'])) {
            $file_name = $this->fileUploadService->uploadPhoto($data['photo']);
            $data['photo'] = $file_name;
        }
        return $this->marketRepository->update($data, $id);
    }


    public function delete($id)
    {
        return $this->marketRepository->delete($id);
    }
}
