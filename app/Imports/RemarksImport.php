<?php

namespace App\Imports;

use App\Remarks;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RemarksImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Remarks([
            'eacode'     => $row['eacode'],
            'hcn'    => $row['hcn'], 
            'shsn'    => $row['shsn'], 
            'member_code'    => $row['member_code'],
            'is'    => $row['is'],
            'remarks'    => $row['remarks'],
        ]);
    }
}
