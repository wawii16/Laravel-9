<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Services\BrandService;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function __construct(
        protected BrandService $brandService,

    ) {}

    public function headings(): array
    {
        return [
            'No',
            'Store_name',
            'Founded_date',
            'Owner',
            'Foto',
            'Created_at',
            'Edited_at'
        ];
    }
    public function collection()
    {
        return $this->brandService->getAllBrands();
    }
}
