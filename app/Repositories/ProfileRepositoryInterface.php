<?php

namespace App\Repositories;

use App\Models\User;

interface ProfileRepositoryInterface
{
    public function getUserById($id);
    public function updateUser($id, array $data);
}
