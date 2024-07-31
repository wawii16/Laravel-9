<?php

namespace App\Repositories;

use App\Repositories\MarketRepositoryInterface;
use App\Models\Market;

class MarketRepository implements MarketRepositoryInterface
{
    public function getAllMarkets()
    {
        return Market::all();
    }

    public function getMarketById($id)
    {
        return Market::findOrFail($id);
    }
    public function create(array $data)
    {
        return Market::create($data);
    }

    public function update(array $data, $id)
    {
        $market = Market::findOrfail($id);
        $market->update($data);
        return $market;
    }


    public function delete($id)
    {
        return Market::findOrFail($id)->delete();
    }
}
