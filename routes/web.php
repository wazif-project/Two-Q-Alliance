<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CompanyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Authentication Routes (disable registration)
Auth::routes(['register' => false]);

// Redirect root to companies
Route::get('/', function () {
    return redirect('/companies');
});

// Redirect /home to companies
Route::get('/home', function () {
    return redirect('/companies');
});

// Company routes protected by authentication
Route::middleware(['auth'])->group(function () {
    Route::resource('companies', CompanyController::class);
});