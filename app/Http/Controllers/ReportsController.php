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
        
        $currentDate = date('Y-m-d');
       
        $repDate = $currentDate;

        $searchDate = $report->input('searchDate');

        $reportDate = Visits::where('created_at', 'LIKE', "%{$searchDate}%")
        ->get();

        if(Gate::allows('is-librarian')){
            return view('reports.reports')->with(['reportDate' => Visits::paginate(10)])->with('searchDate' , $searchDate)->with('repDate', $repDate);
        }
    }

    public function invoice(Request $report){
        return view('reports.invoice');
    }

}
