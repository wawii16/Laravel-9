<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Services\BrandService;

class UsersExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function __construct(
        protected BrandService $brandService,

    ) {}
    public function collection()
    {
        return $this->brandService->getAllBrands();
    }
}
