<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RollController;
use App\Http\Controllers\Admin\userController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

// Auth
Route::get('/', function () {
    return view('adminLayouts.login');
});

Auth::routes();
Route::middleware(['auth'])->group(function () {

        Route::get('/dashboard', function () {
            return view('adminLayouts.app');
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
        Route::get('/pdf-employee/{id}',[HomeController::class,'pdfDistribution'])->name('distribution-pdf');


// modify ditribution
        Route::get('/distribution-edit/{id?}',[HomeController::class,'editDistribution'])->name('distribution.edit');
        Route::put('/distribution-update',[HomeController::class,'updateDistribution'])->name('distribution.update');

// modify sim card of distributions

        Route::put('/simcard-edit',[HomeController::class,'simcardEdit'])->name('sim.edit');


        Route::post('/simcard-distribution',[HomeController::class,'simcardDistribution'])->name('sim.distribution');

        Route::get('/distribution-pdf-criminal/{id?}',[HomeController::class, 'criminalPdf'])->name('distribution-pdf.criminal');


// report routes start here

        Route::get('/report-unit',[HomeController::class,'reportUnit'])->name('report.unit');

        Route::post('search-sim',[HomeController::class,'searchSim'])->name('searchSim.submit');
        Route::get('report-pdf/{id?}',[HomeController::class,'reportPdf'])->name('report.pdf');
        Route::get('/report-excel',[HomeController::class,'export'])->name('data.excel');
// Route::get('/report-excel',[HomeController::class,'']);


// Role  start here

        Route::get('/role',[RollController::class,'index'])->name('role.index');
        Route::get('/getData',[RollController::class,'getData'])->name('role.getData');
        Route::post('/role_create',[RollController::class,'create'])->name('role.create');
        Route::delete('/role_delete/{id?}',[RollController::class,'delete'])->name('role.delete');
        Route::get('/role_create/{id?}',[RollController::class,'update'])->name('role.update');

        // Role assign permission routes
        Route::get('/role_assignPermission/{id?}',[RollController::class,'assignPermission'])->name('role.assignPermission');
        Route::post('/role_givePermission',[RollController::class,'givePermission'])->name('role.givePermission');
        Route::get('/role_givePermission/{id?}',[RollController::class,'getPermissions'])->name('role.getRolePermissions');
        Route::delete('/role_revokePermission',[RollController::class,'revokePermission'])->name('role.revokePermission');
        

//  Role routes end here

// Permission start here

        Route::get('/permission',[PermissionController::class,'permissionIndex'])->name('permission.index');
        Route::get('/permission_getData',[PermissionController::class,'retrieve'])->name('permission.retrieve');
        Route::post('/permission_create',[PermissionController::class,'create'])->name('permission.create');
        Route::delete('/permission_delete/{id?}',[PermissionController::class,'delete'])->name('permission.delete');
        Route::get('/permission_update/{id?}',[PermissionController::class,'update'])->name('permission.update');


// Permission end here

// User routes start here


// user.index
        Route::get('/users',[userController::class,'userIndex'])->name('user.index');
        Route::get('/retrieve',[userController::class,'retrieve'])->name('user.retrieve');
        Route::get('/getUserFrom',[userController::class,'userform'])->name('users.inputFields');
        Route::post('/userSubmit',[userController::class,'formSubmit'])->name('user.submitForm');
        Route::delete('/userDelete/{id?}',[userController::class,'userDelete'])->name('user.delete');
        Route::get('/assignRoleToUser/{id?}',[userController::class,'assignRoleTo'])->name('user.assignRoleToUser');
        Route::post('/userAssignRole/{id?}',[userController::class,'userRoleForm'])->name('user.roleAssignForm');
        Route::delete('/userRevokeuser',[userController::class,'userRevokeRole'])->name('user.revokeRole');
        Route::get('/userAssignPermissionToUser/{id?}',[userController::class,'userAssignPermission'])->name('user.assignPermissionToUser');
        Route::post('/usergivePermissionTo/{id?}',[userController::class, 'givePermissionToUser'])->name('user.givePermissionTo');
        Route::delete('/revokePermission',[userController::class,'revokePermission'])->name('user.revokePermission');
        Route::get('/backToMain',[userController::class,'backToMain'])->name('user.backToUser');


        
        


        


        


        

        

        


// User routes end here


});

require __DIR__.'/auth.php';






// Route::get('/dashboard', function () {
//     return view('adminLayouts.app');
// });
// ->middleware(['auth'])->name('dashboard');
// Route::get('/page', function () {
//     return view('adminLayouts.page');
// });
// require __DIR__.'/auth.php';










// print
// Route::get('/print/{id}',[HomeController::class,'print'])->name('print');



