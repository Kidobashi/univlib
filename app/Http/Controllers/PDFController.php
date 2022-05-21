<?php

namespace App\Http\Controllers;

use App\Models\Visits;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;

class PDFController extends Controller
{
    //
    public function index(){

        return Visits::all();
    }

    public function createPDF($created_at){
        $data = Visits::query()->select('idNumber', 'studentName', 'college', 'course', 'section')
        ->where('created_at', 'LIKE', "%{$created_at}%")
        ->get();

        $date = $created_at;
        //dd($date);

        $pdf = PDF::loadView('reports.invoice', ['data'=> $data]);
        //dd($data);

        //return $pdf->stream('itsolutionstf.pdf');

        return view('reports.invoice')->with(['data'=> $data]);
    }
}
