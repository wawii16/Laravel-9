<?php

namespace App\Imports;

use App\Models\Brand;
use Maatwebsite\Excel\Concerns\ToModel;


class BrandsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        $photoPath = 'Logo.jpg'; // Path relatif dari public folder
        return new Brand([
            'store_name' => $row[0],
            'owner' => $row[1],
            'photo' => $photoPath,
        ]);
    }
}
