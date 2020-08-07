<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use PDF;
use App\Notice;

class NotyicesPDFController extends Controller
{
    public function getNPDF()
    {
        $notices = Notice::latest()->paginate(2);
        $pdf = PDF::loadview('pdf.notices', ['notices' => $notices]);
        return $pdf->download('notices.pdf');
    }
}
