<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use App\Models\Brand;
use App\Helpers\ApiHelpers;
use App\Services\BrandService;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct(
        protected BrandService $brandService,

    ) {}

    public function index()
    {
        try {
            // Get brands
            $brands = $this->brandService->getAllBrands();

            // Return collection of brands as a resource
            $data = BrandResource::collection($brands);
            return ApiHelpers::successResponse($data);
        } catch (\Exception $e) {
            return ApiHelpers::errorResponse(500);
        }
    }
}
