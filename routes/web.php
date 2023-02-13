<?php

use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MediabookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\StatController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/admin', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')
    ->group(function () {
        Route::resource('apartments', ApartmentController::class)->parameters(['apartments' => 'apartment:slug']);
        Route::resource('categories', CategoryController::class)->parameters(['categories' => 'category:slug']);
        Route::resource('mediabooks', MediabookController::class)->parameters(['mediabooks' => 'mediabook:slug']);
        Route::resource('services', ServiceController::class)->parameters(['services' => 'service:slug'])->except('show', 'edit');
        Route::resource('stats', StatController::class)->parameters(['stats' => 'stat:slug']);
        Route::resource('sponsors', SponsorController::class)->parameters(['sponsors' => 'sponsor:slug']);
        Route::get(
            '/pay',
            function () {
                    return view('test');
                }
        )->name('success');
        Route::get('/inbox/{apartment:slug}', [LeadController::class, 'showMails'])->name('show-inbox');
        Route::get('/inbox', [LeadController::class, 'index'])->name('inbox');
        Route::get('/formtest', [LeadController::class, 'testform'])->name('testform');
        Route::post('/formstore ', [LeadController::class, 'store'])->name('store');

    });
Route::get(
    '/success',
    function () {
        return view('success');
    }
);