<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->middleware('auth')
    ->name('home');

Route::controller(CompanyController::class)->group(function (){
    Route::get('/companies', 'index')->name('companies.index')->middleware('auth');
    Route::get('/company', 'getCompanies')->name('getCompanies')->middleware('auth');
    Route::get('/companies.create', 'create')->name('companies.create')->middleware('auth');
    Route::get('/companies/{company}/edit', 'edit')->name('companies.edit')->middleware('auth');
    Route::get('/companies/{company}/show', 'show')->name('companies.show')->middleware('auth');
    Route::post('/companies.store', 'store')->name('companies.store')->middleware('auth');
    Route::patch('/companies/{company}', 'update')->name('companies.update')->middleware('auth');
    Route::delete('/companies/{company}/destroy', 'destroy')->name('companies.destroy')->middleware('auth');

});

Route::controller(EmployeeController::class)->group(function () {
    Route::get('/employee', 'index')->name('employees.index')->middleware('auth');
    Route::get('/employees.create', 'create')->name('employees.create')->middleware('auth');
    Route::get('/employees/{employee}/edit', 'edit')->name('employees.edit')->middleware('auth');
    Route::get('/employees/{employee}/show', 'show')->name('employees.show')->middleware('auth');
    Route::post('/employees.store', 'store')->name('employees.store')->middleware('auth');
    Route::patch('/employees/{employee}', 'update')->name('employees.update')->middleware('auth');
    Route::delete('/employees/{employee}/destroy', 'destroy')->name('employees.destroy')->middleware('auth');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index')->name('users.index')->middleware('auth');
    Route::get('/users.create', 'create')->name('users.create')->middleware('auth');
    Route::get('/users/{user}/edit', 'edit')->name('users.edit')->middleware('auth');
    Route::get('/users/{user}/show', 'show')->name('users.show')->middleware('auth');
    Route::post('/users.store', 'store')->name('users.store')->middleware('auth');
    Route::patch('/users/{user}', 'update')->name('users.update')->middleware('auth');
    Route::delete('/users/{user}/destroy', 'destroy')->name('users.destroy')->middleware('auth');
});




