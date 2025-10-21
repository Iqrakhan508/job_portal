<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;   
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\JobTypeController;
use App\Http\Controllers\EducationLevelController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;

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

Route::middleware('auth')->group(function () {
Route::resource('country', CountryController::class);
Route::resource('city', CityController::class);
Route::resource('job_categories', JobCategoryController::class);
Route::resource('job_types', JobTypeController::class);
Route::resource('education_levels', EducationLevelController::class);
Route::resource('skill', SkillController::class);
Route::resource('company', CompanyController::class);
Route::resource('jobs', JobController::class);

 




Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});

// Route::get('/wellcome/edit/1', [ProductController::class, 'index']);
// Route::get('login', [UserController::class, 'checkLogin'])->name('login');







Route::resource('users', UserController::class);

Route::get('Register', [UserController::class, 'create'])->name('Register');
Route::get('/get-cities/{country_id}', [UserController::class, 'getCities'])->name('getCities');
Route::get('/get-job-cities/{country_id}', [JobController::class, 'getCities'])->name('getJobCities');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');