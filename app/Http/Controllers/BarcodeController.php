<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    public function generateBarcode(Request $request){
        $id = $request->get('id');
        $product = Product::find($id);
        return view('barcode')->with('product',$product);
    }
}
