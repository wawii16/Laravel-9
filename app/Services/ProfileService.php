<?php

namespace App\Services;

use App\Repositories\ProfileRepositoryInterface;
use App\Services\FileUploadService;

class ProfileService
{

    public function __construct(
        protected ProfileRepositoryInterface $profileRepository,
        protected FileUploadService $fileUploadService
    ) {
    }
    public function getUserById($id)
    {
        return $this->profileRepository->getUserById($id);
    }

    public function updateUser($id, array $data)
    {
        $currentUser = $this->profileRepository->getUserById($id);

        // Handle file upload for updates
        if (isset($data['photo'])) {
            // Delete the old photo file
            $this->fileUploadService->deletePhoto($currentUser->photo, $id);

            // Upload the new photo file
            $file_name = $this->fileUploadService->uploadPhoto($data['photo']);
            $data['photo'] = $file_name;
        }

        return $this->profileRepository->updateUser($id, $data);
    }
}
