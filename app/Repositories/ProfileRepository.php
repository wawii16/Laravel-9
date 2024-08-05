<?php

namespace App\Repositories;

use App\Models\User;

class ProfileRepository implements ProfileRepositoryInterface
{
    public function getUserById($id)
    {
        return User::findOrFail($id);
    }

    public function updateUser($id, array $data)
    {
        $user = User::findOrFail($id);
        $user->update($data);

        return $user;
    }
}
