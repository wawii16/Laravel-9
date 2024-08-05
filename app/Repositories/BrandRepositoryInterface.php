<?php

namespace App\Repositories;

interface BrandRepositoryInterface
{
    public function getAllBrands();
    public function getBrandById($id);
    public function create(array $data);
    public function update(array $data, $id);
    public function delete(array $id);
}
