<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashBoardController;


// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);
Route::get('/', [UserController::class, 'showLoginForm'])->name('login');

Route::post('/', [UserController::class, 'login']);
Route::get('/dashboard', [ DashBoardController::class, 'dashboard'])->name('dashboard')->middleware('auth');



// admin dashboard pages controller

Route::get('/clientRegister', [AdminController::class, 'clientRegister'])->name('clientRegister')->middleware('auth');

Route::get('/summery', [AdminController::class, 'summery'])->name('summery')->middleware('auth');

Route::get('/clientDetails', [AdminController::class, 'clientDetails'])->name('clientDetails')->middleware('auth');

Route::get('/Installment', [AdminController::class, 'Installment'])->name('Installment')->middleware('auth');



Route::get('/EditDetailes',[AdminController::class, 'editDetailes'])->name('editDetailes');

Route::post('/clientRegister', [AdminController::class, 'register'])->name('clientRegister.submit')->middleware('auth');

//Route::get('/viewDetailes/{customer_id}', [AdminController::class, 'viewDetailes'])->name('viewDetailes');
//
//Route::get('ViewDetails', [AdminController::class, 'viewDetails']);

Route::get('/ViewDetailes',[AdminController::class, 'viewDetailes'])->name('viewDetailes');
Route::get('/viewDetailsShow/{customer_id}', [AdminController::class, 'viewDetailsShow'])->name('viewDetailsShow');

//Route::get('/', [DashBoardController::class, 'index'])->name('dashboard.index');
//Route::post('/savetask', [DashBoardController::class, 'store'])->name('task.store');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'Dashboard'])->name('dashboard.index');
    Route::post('/dashboard', [DashboardController::class, 'store']);
    Route::get('/task/complete/{id}', [DashboardController::class, 'markCompleted'])->name('task.markcompleted');
    Route::get('/task/delete/{id}', [DashboardController::class, 'delete'])->name('task.delete');
    Route::get('/task/update/{id}', [DashboardController::class, 'updateView'])->name('task.updateview');
    Route::post('/task/update/{id}', [DashboardController::class, 'updatetasks'])->name('task.update');
});
