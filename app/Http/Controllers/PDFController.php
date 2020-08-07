<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use PDF;
use App\Student;
use App\Notice;

class PDFController extends Controller
{
    /**
     * [getPDF description]
     * @return [type] [description]
     */
    public function getPDF()
    {
        $students = Student::latest()->paginate(10);
        $pdf = PDF::loadView('pdf.students', ['students' => $students]);
    }
    /**
     * [getNPDF description]
     * @return [type] [description]
     */
    public function getNPDF()
    {
        $notices = Notice::latest()->paginate(1);
        $pdf = PDF::loadview('pdf.notices', ['notices' => $notices]);
        return $pdf->stream('notices.pdf');
    }

    public function getTester()
    {
        return view('search.ab.trester');
    }
}
