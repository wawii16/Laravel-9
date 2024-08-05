<?php

namespace App\Services;

use App\Repositories\ProfileRepositoryInterface;

class ProfileService
{
    protected $profileRepository;

    public function __construct(ProfileRepositoryInterface $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function getUserById($id)
    {
        return $this->profileRepository->getUserById($id);
    }

    public function updateUser($id, array $data)
    {
        return $this->profileRepository->updateUser($id, $data);
    }
}
