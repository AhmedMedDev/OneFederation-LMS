<?php

namespace App\Imports;

use App\Models\SegwitzCourseCertificate;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CertificatesImportWo implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // $award_date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['award_date'])->format('d-m-Y');

        return new SegwitzCourseCertificate([
            'certificate_code'  => substr(md5(rand()), 0, 7),
            'student_name'      => $row['name'],
            'type'              => $row['type'],
            'course_name'       => $row['course'],
            'trainer'           => $row['trainer'],
            'course_hours'      => $row['hours'],
            'award_date'        => $row['award_date'],
        ]);
    }
}
