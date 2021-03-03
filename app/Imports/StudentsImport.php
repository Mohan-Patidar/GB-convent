<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use session;

class StudentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'gbs_id'  => $row[0],
            'student_id'  => $row[1],
            'scholar_no'  => $row[2],
            'name'  => $row[3],
            'dob'  => $row[4],
            'father_name'  => $row[5],
            'mother_name'  => $row[6],
            'address'  => $row[7],
            'aadhar_no'  => $row[8],
            'samarg_id'  => $row[9],
            'mobile_no'  => $row[10],
            'mobile_no2'  => $row[11],
            'account_no'  => $row[12],
            'add_session'  => $row[13],
            'profile_picture'=>$row[14]
        ]);
         Session::flash('message','Import Successful.');
    }
}
