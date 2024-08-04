<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MarketResource;
use App\Models\Market;
use App\Helpers\ApiHelpers;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function index()
    {
        try {
            // Get markets
            $markets = Market::latest()->paginate(5);

            // Return collection of markets as a resource
            $data = MarketResource::collection($markets);
            return ApiHelpers::successResponse($data);
        } catch (\Exception $e) {
            return ApiHelpers::errorResponse(500);
        }
    }
}
