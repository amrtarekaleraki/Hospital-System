<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\DoctorController;









Route::get('/Dashboard_Admin', [DashboardController::class, 'index']);








Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){


   //################################ dashboard user ##########################################
    Route::get('/dashboard/user', function () {
        return view('Dashboard.User.dashboard');
    })->middleware(['auth'])->name('dashboard.user');
    //################################ end dashboard user #####################################



    //################################ dashboard admin ########################################
    Route::get('/dashboard/admin', function () {
        return view('Dashboard.Admin.dashboard');
    })->middleware(['auth:admin'])->name('dashboard.admin');

    //################################ end dashboard admin #####################################

//---------------------------------------------------------------------------------------------------------------


    Route::middleware(['auth:admin'])->group(function () {

        //############################# sections route ##########################################

          Route::resource('Sections', SectionController::class);

        //############################# end sections route ######################################


       //############################# Doctors route ##########################################

         Route::resource('Doctors', DoctorController::class);
         Route::post('update_password', [DoctorController::class, 'update_password'])->name('update_password');
         Route::post('update_status', [DoctorController::class, 'update_status'])->name('update_status');

      //############################# end Doctors route ######################################



    });




    require __DIR__.'/auth.php';


});

















// Route::get('/dashboard/user', function () {
//     return view('Dashboard.User.dashboard');
// })->middleware(['auth'])->name('dashboard.user');


// Route::get('/dashboard/admin', function () {
//     return view('Dashboard.Admin.dashboard');
// })->middleware(['auth:admin'])->name('dashboard.admin');
