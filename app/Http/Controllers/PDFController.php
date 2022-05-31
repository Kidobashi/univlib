<?php

namespace App\Http\Controllers;

use App\Models\Visits;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\App;
class PDFController extends Controller
{
    //
    public function index(){

        return redirect('reports');
    }

    public function createPDF($created_at){
        if($created_at == null)
        {
            $created_at = date("Y-m-d");
        }
        else{

        $data = Visits::query()->select('idNumber', 'studentName', 'college', 'course', 'section', 'library', 'created_at')
        ->where('created_at', 'LIKE', "%{$created_at}%")
        ->get();

        $date = $created_at;
        //dd($date);

         $pdf = PDF::loadView('reports.invoice', ['data'=> $data]);

        return view('reports.invoice')->with(['data'=> $data]);
        }
    }

}
