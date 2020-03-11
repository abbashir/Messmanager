<?php



// Route::get('/', function () {
//     return view('welcome');
// });

/*
|--------------------------------------------------------------------------
| Admin Routes Start
|--------------------------------------------------------------------------
*/
Route::get('/', 'Admin\AdminAuthController@ShowLoginForm')->name('admin.login');
Route::post('/', 'Admin\AdminAuthController@LoginAction')->name('admin.login');

Route::middleware(['Admin.Auth'])->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {

    //dashboard
    Route::get('dashboard', 'AdminAuthController@dashboard')->name('dashboard');

    //Change Password
    Route::get('changePassword', 'DashboardController@changePassword')->name('changePassword');
    //change password
    Route::post('changePassword', 'DashboardController@PasswordUpdate')->name('changePassword');

    //logout
    Route::post('logout', 'AdminAuthController@logout')->name('logout');

});


Route::resource('borders', 'BorderController');
Route::resource('meal', 'MealController');
/*
|--------------------------------------------------------------------------
| Admin Routes End
|--------------------------------------------------------------------------
*/
