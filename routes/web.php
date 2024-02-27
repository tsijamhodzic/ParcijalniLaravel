<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\LogMessageMiddleware;
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

Route::view('/', 'welcome')
    ->name('home');

Route::redirect('/home', '/');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/test', [TestController::class, 'index'])->name('test.index');
    Route::resource('ids', TestController::class)
        ->middleware(LogMessageMiddleware::class);


    Route::get('/members/account', [MemberController::class, 'account'])
        ->name('members.account');

    Route::resource('members', MemberController::class);

    Route::apiResource('media', MediaController::class);
});

require __DIR__.'/auth.php';
