<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\ProjectController;

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

Route::get('/', [PublicController::class, 'welcome'])->name('welcome');

Route::get('/index', [ProjectController::class, 'index']) -> name('project.index');

Route::get('/about-us', [PublicController::class, 'about']) -> name('about');

Route::get('/contact', [PublicController::class, 'contact']) -> name('contact');

Route::get('/projects/{project}', [ProjectController::class, 'show']) -> name('project.show');

Route::post('/mail/send', [PublicController::class, 'sendMail'])->name('send_mail');

Route::get('/login', [PublicController::class, 'login']) -> name('login');

Route::middleware(['auth'])->group(function(){
    Route::get('/create', [ProjectController::class, 'create']) -> name('project.create');
    Route::get('/admin', [PublicController::class, 'admin']) -> name('admin');
    Route::get('/project/{project}/edit', [ProjectController::class, 'edit'])->name('project.edit');
    Route::delete('/project/{project}/delete', [ProjectController::class, 'destroy'])->name('project.delete');
    Route::delete('/project/photos/{photo}/delete', [PhotoController::class, 'destroy'])->name('photo.delete');
    // Workers
    Route::post('/worker/new/store', [WorkerController::class, 'store']) -> name('worker.store');
    Route::put('/worker/edit/{worker}', [WorkerController::class, 'update'])->name('worker.update');
    Route::delete('/project/delete/{worker}', [WorkerController::class, 'destroy'])->name('worker.delete');
});