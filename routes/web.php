<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\TaskController;
use App\Http\Controllers\Front\ProjectController;
use App\Http\Controllers\Front\CompanyController;
use App\Http\Controllers\Front\CalendarController;
use App\Http\Controllers\Admin\DashboardController;

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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/company', [CompanyController::class, 'index'])->name('company.index');
Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');


Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

