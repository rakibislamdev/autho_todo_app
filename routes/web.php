<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::prefix('/')->middleware(['auth'])->group(function () {
    Route::get('/', [TodoController::class, 'index']);

    Route::post('/store', [TodoController::class, 'store']);

    Route::get('/edit/{todo}', [TodoController::class, 'edit']);

    Route::put('/update/{todo}', [TodoController::class, 'update']);

    Route::delete('/delete/{todo}', [TodoController::class, 'destroy']);

    Route::get('/status', [TodoController::class, 'status']);
});
