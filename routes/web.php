<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\TaskController;
use App\Http\Controllers\Front\ProjectController;
use App\Http\Controllers\Front\CompanyController;
use App\Http\Controllers\Front\CalendarController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\ProjectFileController;
use App\Http\Controllers\Admin\TaskController;
use Illuminate\Support\Facades\Auth;

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

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::resource('projects', ProjectController::class);
    Route::get('projects/{project}/tasks', [TaskController::class, 'index'])->name('projects.tasks.index');
    Route::post('projects/{project}/files', [ProjectFileController::class, 'store'])->name('projects.files.store');
    Route::delete('projects/files/{file}', [ProjectFileController::class, 'destroy'])->name('projects.files.destroy');
    
    Route::post('projects/{project}/tasks', [TaskController::class, 'store'])->name('projects.tasks.store');
    Route::get('tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
    Route::put('tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::get('/', function () {
        $user = Auth::user();
        $tasksCount = $user->tasks()->count();
        $routinesCount = $user->routines()->count();
        $notesCount = $user->notes()->count();
        $calendarEventsCount = $user->calendarEvents()->count();
        $recentTasks = $user->tasks()->latest()->take(5)->get();
        $todayRoutines = $user->routines()->whereDate('start_time', now())->get();
        $recentNotes = $user->notes()->latest()->take(5)->get();
        $upcomingEvents = $user->calendarEvents()->where('start_time', '>=', now())->take(5)->get();
        return view('dashboard', compact('tasksCount', 'routinesCount', 'notesCount', 'calendarEventsCount', 'recentTasks', 'todayRoutines', 'recentNotes', 'upcomingEvents'));
    })->name('dashboard');

});


