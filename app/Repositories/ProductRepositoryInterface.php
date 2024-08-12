<?php

namespace App\Repositories;

interface ProductRepositoryInterface
{
    public function getAllProducts();
    public function getProductById($id);
    public function create(array $data);
    public function update(array $data, $id);
    public function delete(array $id);
}
