<?php

namespace App\Imports;

use App\Models\Tbc2023Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KasusImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        if (isset($row['kotakab']) && $row['kotakab'] != null) {
            $get_id = DB::table('tbc_tahun_2023')->orderBy('id', 'DESC')->first();
            $data = [
                'id' => (int)$get_id->id += 1,
                'nama' => $row['kotakab'],
                'konfirmasi' => $row['penderita'],
                'sembuh' => $row['sembuh'],
                'meninggal' => $row['meninggal'],
                'latitude' => $row['latitude'],
                'longitude' => $row['longitude'],
                'tahun' => $row['tahun'],
            ];
    
            DB::table('tbc_tahun_2023')->insert($data);
        }
    }

}
