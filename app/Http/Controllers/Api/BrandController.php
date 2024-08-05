<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use App\Models\Brand;
use App\Helpers\ApiHelpers;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        try {
            // Get brands
            $brands = Brand::latest()->paginate(5);

            // Return collection of brands as a resource
            $data = BrandResource::collection($brands);
            return ApiHelpers::successResponse($data);
        } catch (\Exception $e) {
            return ApiHelpers::errorResponse(500);
        }
    }
}
