<?php

namespace App\Exports;

use App\Models\SegwitzCourseCertificate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CourseCertificateExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SegwitzCourseCertificate::select(
        'certificate_code',
        'student_name',
        'type',
        'course_name',
        'trainer',
        'course_hours',
        'award_date')->get();
    }

    public function headings(): array
    {
        return [
            'no',
            'name',
            'type',
            'course',
            'trainer',
            'hours',
            'award_date'
        ];
    }
}
