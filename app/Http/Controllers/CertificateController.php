<?php

namespace App\Http\Controllers;

use App\Exports\CourseCertificateExport;
use App\Imports\CertificatesImport;
use App\Imports\CertificatesImportWo;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CertificateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request, $type)
    {
        if ($type == 'wo') Excel::import(new CertificatesImportWo, $request->cerExcel);

        else Excel::import(new CertificatesImport, $request->cerExcel);
        
        return redirect()->back()->with(['successAlert' => 'success message']);
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        return Excel::download(new CourseCertificateExport, 'CourseCertificates.xlsx');
    }
}
