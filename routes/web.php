<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\VisitorsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\SummaryController;
use Illuminate\Support\Facades\Log;

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

Route::get('/faculty', function(){
    return view('faculty');
});

Route::get('/reports', function(){
    return view('reports/reports');
});

//Route::get('/invoice', function(){
    //return view('reports/invoice');
   // $pdf = PDF::loadView('reports/invoice');
    //return $pdf->download('invoice.pdf');
// });

//Route::get('/invoice', [ReportsController::class, 'invoice'])->name('reportDate');
Route::get('/reports/pdf', [StudentsController::class, 'downloadPDF']);
Route::get('/reports', [ReportsController::class, 'index']);
Route::get('/reports', [ReportsController::class, 'getReports'])->name('searchDate');
Route::get('/students', [StudentsController::class, 'index']);
Route::get('/verify', [StudentsController::class, 'checkId'])->name('verify');
Route::get('/visitor', [VisitorsController::class, 'storeVisitor'])->name('visitor');
Route::get('create-pdf', [PDFController::class, 'index'])->name('index');
Route::get('create-pdf/{created_at?}', [PDFController::class, 'createPDF'])->name('data');

Route::post('assignLibrarian/', [UserController::class, 'asssignLibrarian'])->middleware(['auth','password.confirm'])->name('asssign');

Route::get('showLibrarian/{id}', [UserController::class, 'librarianCategory'])->name('category');
Route::get('showLibrarian/{id}', [UserController::class, 'showLibrarian'])->name('roles');
Route::get('librarianCategory/{id?}', [UserController::class, 'librarianCategory']);

//Summary
Route::get('dashboard', [SummaryController::class, 'dailyVisits']);
//Route::get('create-pdf/reportDate', [ReportsController::class, 'getReports'])->name('reportDate');


//Route::get('/', [ReportsController::class, 'index']);
//Route::get('/', [StudentsController::class, 'checkId'])->name('data');


//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Auth::routes();

//Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

