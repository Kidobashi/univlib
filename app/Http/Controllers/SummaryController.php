<?php

namespace App\Http\Controllers;

use App\Models\Visits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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

    //dd($visits);
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

    public function readingRooms(){
        $user = DB::table('users')->find(auth()->user()->id);

        $assignment = DB::table('librarian_users')->select('category_id')
        ->where('user_id', '=', auth()->user()->id)->first();

        $rrAssignment = DB::table('librarian_cat')->select('category')
        ->where('id', '=', $assignment->category_id)->first();

        $rr = Visits::where('library',$rrAssignment->category)
        ->get()->count();

        return view('dashboard')->with('rr', $rr);
    }
}
