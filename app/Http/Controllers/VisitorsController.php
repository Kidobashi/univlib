<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Students;
use App\Models\Visits;

class VisitorsController extends Controller
{
    //
    function index(){
        return Visits::all();
    }

    function storeVisitor(Request $id){

        $visitor = $id->input('visitor');

        Visits::create([
            'idNumber' => "Visitor",
            'studentName' => $visitor,
            'college' => "N/A",
            'course' => "N/A",
            'section' => request('section'),
        ]);

        #DB::table('visits')->insert([
        #    'id_number' => "Visitor",
        #    'course' => "N/A",
        #    'studentName' => $visitor,
        #    'date' => $visitor->created_at, 
        #]);

        return redirect("/visitor")->withSuccess( $visitor.' You are verified, Welcome!');
    }
}
