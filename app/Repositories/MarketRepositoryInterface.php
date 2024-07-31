<?php

namespace App\Repositories;

interface MarketRepositoryInterface
{
    public function getAllMarkets();
    public function getMarketById($id);
    public function create(array $data);
    public function update(array $data, $id);
    public function delete(array $id);
}
