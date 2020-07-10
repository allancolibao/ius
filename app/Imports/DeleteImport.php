<?php

namespace App\Imports;

use App\Delete;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DeleteImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Delete([
            'eacode'     => $row['eacode'],
            'hcn'    => $row['hcn'], 
            'shsn'    => $row['shsn'], 
            'member_code'    => $row['member_code'],
        ]);
    }
}