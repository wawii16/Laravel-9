<?php

namespace App\Repositories;

use App\Repositories\BrandRepositoryInterface;
use App\Models\Brand;

class BrandRepository implements BrandRepositoryInterface
{
    public function getAllBrands()
    {
        return Brand::all();
    }

    public function getBrandById($id)
    {
        return Brand::findOrFail($id);
    }
    public function create(array $data)
    {
        return Brand::create($data);
    }

    public function update(array $data, $id)
    {
        $brand = Brand::findOrfail($id);
        $brand->update($data);
        return $brand;
    }


    public function delete($id)
    {
        return Brand::findOrFail($id)->delete();
    }
}
