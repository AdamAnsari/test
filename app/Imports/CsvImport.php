<?php

namespace App\Imports;

use App\student;
use Maatwebsite\Excel\Concerns\ToModel;

class CsvImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new student([
            //
            'name'  => $row["name"],
            'birthday'  => $row["birthday"],
            'gender'  => $row["gender"],
            'state'  => $row["state"],
            'city'  => $row["city"],
            'education'  => $row["education"],
            'year'  => $row["year"],
            'skills'  => $row["skills"],
            'profession'  => $row["profession"],
            'email'  => $row["email"],
            'mobile'  => $row["mobile"],
        ]);
    }
}
