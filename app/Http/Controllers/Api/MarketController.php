<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MarketResource;
use App\Models\Market;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function index()
    {
        //get posts
        $markets = Market::latest()->paginate(5);

        //return collection of posts as a resource
        return new MarketResource(true, 'List Data Posts', $markets);
    }
}
