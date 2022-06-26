<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('adminLayouts.login');
});

// rank routes start here
Route::get('/rank', [HomeController::class,'rank'])->name('rank.data');
Route::post('rank_insert','App\Http\Controllers\HomeController@rankAdd');
Route::get('fetch_data',[HomeController::class,'fetchData']);
Route::delete('delete/{id?}',[HomeController::class,'deleteData'])->name('data.delete');
Route::get('update/{id?}',[HomeController::class,'updateData'])->name('data.update');
Route::put('updating/{id?}',[HomeController::class,'updatingData'])->name('data.updating');
Route::post('search',[HomeController::class,'searchData'])->name('data.search');
// rank routes end here

// unit routes start here
Route::get('/unit',[HomeController::class,'unit'])->name('unit.data');
Route::post('/unit_insert',[HomeController::class,'insert'])->name('unit.insert');
Route::get('/unit_fetch',[HomeController::class,'fetchUnit'])->name('unit.fetch');
Route::delete('/unit_delete/{id?}',[HomeController::class,'delete'])->name('unit.delete');
Route::get('/unit_update/{id?}',[HomeController::class,'update'])->name('unit.update');
Route::put('/unit_updating/{id?}',[HomeController::class,'updating'])->name('unit.updating');
Route::post('search-unit',[HomeController::class,'searchUnit'])->name('unit.search');
// unit routes end here

// distribution routes start here
Route::get('/distribution',[HomeController::class,'distribution'])->name('distribution.data');
Route::get('/getRank',[HomeController::class,'getRank'])->name('distribution.getRank');
Route::get('/getUnit',[HomeController::class,'getUnit'])->name('distribution.getUnit');
Route::post('/save',[HomeController::class,'save'])->name('distribution.save');
// distribution routes end here


// Search Staff routes start here

Route::get('/search-staff',[HomeController::class,'searchStaff'])->name('searchStaff.data');
Route::get('/submit-staff',[HomeController::class,'SearchSubmitForm'])->name('searchStaff.submit');

// Modfiy Search
// Route::get('/submit-staff',[HomeController::class,'SearchSubmitForm']);

Route::get('/info-employee/{id}',[HomeController::class,'infoDistribution'])->name('distribution-info');










 









Route::get('/dashboard', function () {
    return view('adminLayouts.app');
})->middleware(['auth'])->name('dashboard');
// Route::get('/page', function () {
//     return view('adminLayouts.page');
// });

require __DIR__.'/auth.php';
