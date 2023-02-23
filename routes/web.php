<?php
#use Illuminate\Http\Request;
use App\Models\Concerts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandsController;
use App\Http\Controllers\ConcertsController;
use App\Http\Controllers\SearchBandsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    $concerts = Concerts::orderBy('event_date', 'desc')->get();

    return view('home', ['concerts' => $concerts]);
});
Route::resource('search', SearchBandsController::class);

Route::resource('bands/{band}', BandsController::class);

Route::resource('concerts', ConcertsController::class);