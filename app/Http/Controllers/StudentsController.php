<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Students;
use App\Models\Visits;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use PDF;

class StudentsController extends Controller
{
    //
    function index(){
        return Students::all();
    }

    function checkId(Request $id){
        $verify = $id->input('verify');

        $data = Students::select('name', 'deg_program', 'student_college')
            ->where('id_number', 'LIKE', "%{$verify}%")
            ->first();


        if($data === null){
            Visits::insert([
                'idNumber' => 'visitor',
                'studentName' => $verify,
                'college' => ' ',
                'course' => ' ',
                'section' => request('section'),
                'library' => request('library'),
                'created_at' => date('Y-m-d')
            ]);
            return redirect("/student")->withSuccess( 'Welcome, '. $verify .'!');
        }
            else{
                Visits::insert ([
                    'idNumber' => $verify,
                    'studentName' => $data->name,
                    'college' => $data->student_college,
                    'course' => $data->deg_program,
                    'section' => request('section'),
                    'library' => request('library'),
                    'created_at' => date('Y-m-d')
                ]);
                return redirect("/student")->withSuccess( 'Welcome, '. $data->name .'!');
            }
        //return dd($data);
    }

    function store(Request $id)
    {

        $data = Students::create($id->all());

        DB::table('visits')->insert([
            'id_number' => $data->id_number,
            'course' => $data->deg_program,
            'studentName' =>$data->name,
            'date' => $data->created_at,
        ]);
    //return dd($data);
    //return redirect()->back() ->with('Success!','You may now Enter');
    }
}

