<?php

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

use App\Http\Controllers;

Route::get('/', [Controllers\Front\FrontController::class, 'accueil'])->name('accueil');

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::redirect('/', 'admin/dashboard');

    Route::get('/dashboard', [Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', Controllers\UserController::class);
    Route::resource('roles', Controllers\RoleController::class);
});

require __DIR__.'/auth.php';
