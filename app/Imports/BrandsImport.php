<?php

namespace App\Imports;

use App\Models\Brand;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BrandsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        $photoPath = 'Logo.jpg'; // Path relatif dari public folder
        // Mengonversi format tanggal 'm/d/Y' menjadi 'Y-m-d'
        $foundedDate = Date::excelToDateTimeObject($row['founded_date'])->format('Y-m-d');


        return new Brand([
            'store_name' => $row['brand_name'],
            'owner' => $row['owner'],
            'photo' => $photoPath,
            'founded_date' => $foundedDate, // Menyimpan tanggal yang sudah dikonversi
        ]);
    }
}
