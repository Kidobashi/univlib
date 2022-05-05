<?php

namespace App\Http\Controllers;

use App\Models\Visits;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ReportsController extends Controller
{
    //
    public function index(){
        return Visits::all();
    }

    public function getReports(Request $report){
        if(Gate::denies('logged-in')){
            return view('welcome');
        }

        $repDate = $report->input('reportDate');

        $reportDate = Visits::where('created_at', 'LIKE', "%{$repDate}%")
            ->get();

        if(Gate::allows('is-librarian')){
            return view('reports.reports')->with('reportDate', $reportDate)->with('repDate', $repDate);
        }
    }

    public function invoice(Request $report){
        return view('reports.invoice');
    }

}
