<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Setting\SettingController;
use App\Http\Controllers\Major\MajorController;
use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\Alumni\AlumniController;
use App\Http\Controllers\Forum\ForumController;

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

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

Route::get('/contact', function () {
    return view('contact');
})->name('alumni');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    });

    Route::prefix('setting')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('setting');
        Route::post('/{id}', [SettingController::class, 'update'])->name('setting.update');
    });

    Route::resource('jurusan', MajorController::class);
    Route::get('/jurusan/delete/{id}', [MajorController::class, 'destroy'])->name('jurusan.delete');

    Route::resource('event', EventController::class);
    Route::get('/event/delete/{id}', [EventController::class, 'destroy'])->name('event.delete');

    Route::resource('alumni', AlumniController::class);
    Route::get('/alumni/delete/{id}', [AlumniController::class, 'destroy'])->name('alumni.delete');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('event', EventController::class);
    Route::get('/event/delete/{id}', [EventController::class, 'destroy'])->name('event.delete');
    Route::get('/list-alumni', [AlumniController::class, 'list'])->name('list.alumni');
    Route::get('/alumni/show/{id}', [AlumniController::class, 'show'])->name('show.alumni');
    Route::get('/alumni/details/{id}', [AlumniController::class, 'detail'])->name('show.detail');

    Route::resource('forum', ForumController::class);

    Route::post('/comment', [ForumController::class, 'comment'])->name('comment');

    Route::get('/forum/delete/{id}', [ForumController::class, 'destroy'])->name('forum.delete');
    Route::get('/comment/delete/{id}', [ForumController::class, 'delete'])->name('comment.delete');
});

Route::get('/events/show/{id}', [EventController::class, 'show'])->name('events.alumni');
Route::get('/list-events', [EventController::class, 'list'])->name('list.events');