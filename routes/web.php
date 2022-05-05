<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\VisitorsController;
use App\Http\Controllers\ReportsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Admin Routes
Route::prefix('admin')->middleware(['auth', 'auth.isAdmin'])->name('admin.')->group(function(){
    Route::resource('/users', UserController::class);
});

Route::get('/', function () {
    return view('welcome');
});


Route::get('/app', function(){
    return view('app');
});

Route::get('/about', function(){
    return view('easteregg');
});

Route::get('/student', function(){
    return view('student');
});

Route::get('/dash', function(){
    return view('usermngt/dashboard');
});

Route::get('/visitor', function(){
    return view('visitor');
});

Route::get('/faculty', function(){
    return view('faculty');
});

Route::get('/reports', function(){
    return view('reports/reports');
});

Route::get('/invoice', function(){
    //return view('reports/invoice');
    $pdf = PDF::loadView('reports/invoice');
    return $pdf->download('invoice.pdf');
});

Route::get('/invoice', [ReportsController::class, 'invoice'])->name('reportDate');
Route::get('/reports', [ReportsController::class, 'index']);
Route::get('/reports', [ReportsController::class, 'getReports'])->name('reportDate');
Route::get('/students', [StudentsController::class, 'index']); 
Route::get('/verify', [StudentsController::class, 'checkId'])->name('verify'); 
Route::get('/visitor', [VisitorsController::class, 'storeVisitor'])->name('visitor'); 

//Route::get('/', [ReportsController::class, 'index']);
//Route::get('/', [StudentsController::class, 'checkId'])->name('data'); 


//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
