<?php

namespace App\Http\Controllers;

use App\Models\Visits;
use Illuminate\Http\Request;


class SummaryController extends Controller
{
    //
    public function dailyVisits(Request $report)
    {
    $currentDate = date('Y-m-d');

    $repDate = $currentDate;

    $searchDate = $report->input('searchDate');

    $visits = Visits::where('created_at', 'LIKE', "%{$repDate}%")
        ->get()->count();
    //$visits = Visits::query('*')->where('created_at', 'LIKE', "%{$searchDate}%")->distinct('studentName')->get()->count();

    return view('dashboard')->with('visits', $visits);
    //return view('reports.reports')->with(['reportDate' => Visits::paginate(10)])->with('searchDate' , $searchDate)->with('repDate', $repDate);\
    }

    public function altVisits(Request $report)
    {
    $currentDate = date('Y-m-d');

    $repDate = $currentDate;

    $searchDate = $report->input('searchDate');

    $visits = Visits::where('created_at', 'LIKE', "%{$repDate}%")
        ->get()->count();
    //$visits = Visits::query('*')->where('created_at', 'LIKE', "%{$searchDate}%")->distinct('studentName')->get()->count();

    return view('home')->with('visits', $visits);
    //return view('reports.reports')->with(['reportDate' => Visits::paginate(10)])->with('searchDate' , $searchDate)->with('repDate', $repDate);\
    }
}
