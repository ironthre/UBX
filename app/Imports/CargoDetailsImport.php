<?php

namespace App\Imports;

use App\Models\Cargo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CargoDetailsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new Cargo([
            'cargo_no' => $row['cargo_no'],
            'cargo_type' => $row['cargo_type'],
            'cargo_size' => $row['cargo_size'],
            'weight' => $row['weight_kg'],
            'remark' => $row['remarks'],
            'wharfage' => $row['wharfage_usd'],
            'penalty' => $row['penalty_days'],
            'storage' => $row['penalty_days']*20,
            'electricity' => $row['electricity_usd'],
            'destuffing' => $row['destuffingusd'],
            'lifting' => $row['lifting_usd'],
        ]);
    }
}
