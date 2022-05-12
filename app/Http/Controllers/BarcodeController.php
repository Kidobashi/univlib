<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    public function generateBarcode(Request $request){
        $id = $request->get('id');
        $student = Students::find($id);
        return view('barcode')->with('student',$student);
    }
}
