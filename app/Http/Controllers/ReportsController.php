<?php

namespace App\Http\Controllers;

use App\Models\Visits;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use PDF;

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

        $reportDate = DB::table('visits')->select('*')->groupBy('studentName');

        $currentDate = date('Y-m-d');

        $repDate = $currentDate;

        $searchDate = $report->input('searchDate');

        $reportDate = Visits::where('created_at', 'LIKE', "%{$searchDate}%")
        ->get();

        if(Gate::allows('is-librarian')){
            return view('reports.reports')->with(['reportDate' => $reportDate])->with('searchDate' , $searchDate)->with('repDate', $repDate);
        }
    }
}
