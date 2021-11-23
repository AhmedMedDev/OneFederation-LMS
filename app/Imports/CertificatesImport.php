<?php

namespace App\Imports;

use App\Models\SegwitzCourseCertificate;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CertificatesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row['award_date']);
        return new SegwitzCourseCertificate([
            'certificate_code'  => $row['no'],
            'student_name'      => $row['name'],
            'type'              => $row['type'],
            'course_name'       => $row['course'],
            'trainer'           => $row['trainer'],
            'course_hours'      => $row['hours'],
            'award_date'        => Carbon::parse($row['award_date']),
        ]);
    }
}
