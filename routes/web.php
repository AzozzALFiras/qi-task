<?php


use App\Livewire\Tasks\tasks;
use App\Livewire\tasks\ViewTasks;
use App\Livewire\projects\Projects;
use Illuminate\Support\Facades\Route;
use App\Livewire\dashboard\DashboardStats;
use App\Http\Controllers\ProfileController;

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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/projects', Projects::class)->name('projects.index');
    Route::get('/projects/{project}/tasks', Tasks::class)->name('projects.tasks');
    Route::get('/viewTasks/{id}', ViewTasks::class)->name('tasks.view');
    Route::get('/dashboard', DashboardStats::class) ->name('dashboard');

   

});

require __DIR__.'/auth.php';
