<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();

        if(Gate::denies('logged-in')){
            return view('welcome');
        }

        if(Gate::allows('is-admin')){
          return view('welcome', ['users' => $users]);
        }

        if(Gate::allows('is-librarian')){
            return view('dashboard');
          }
    }
}
