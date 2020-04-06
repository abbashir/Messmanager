<?php



// Route::get('/', function () {
//     return view('welcome');
// });

/*
|--------------------------------------------------------------------------
| Admin Routes Start
|--------------------------------------------------------------------------
*/
Route::get('/', 'Admin\AdminAuthController@ShowLoginForm')->name('admin.login1');
Route::post('/admin', 'Admin\AdminAuthController@LoginAction')->name('admin.login');

Route::middleware(['Admin.Auth'])->namespace('Admin')->name('admin.')->group(function () {

    //dashboard
    Route::get('dashboard', 'AdminAuthController@dashboard')->name('dashboard');

    //Change Password
    Route::get('changePassword', 'DashboardController@changePassword')->name('changePassword');
    //change password
    Route::post('changePassword', 'DashboardController@PasswordUpdate')->name('changePassword');

    //logout
    Route::post('logout', 'AdminAuthController@logout')->name('logout');

});


Route::middleware(['Admin.Auth'])->group(function () {
Route::resource('borders', 'BorderController');
Route::resource('meal', 'MealController');
Route::resource('ledger', 'LedgerController');
Route::resource('expense', 'ExpensesController');

Route::post('show-ledger-byid', 'GeneralController@ShowExpenseByUser')->name('show_ledger');

});


/*
|--------------------------------------------------------------------------
| Admin Routes End
|--------------------------------------------------------------------------
*/
