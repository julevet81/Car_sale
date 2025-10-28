<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarModelController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.user.login.signin');
});

Route::get('/dashboard/user', function () {
    return view('dashboard.user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard.user');

Route::get('/dashboard/admin', function () {
    return view('dashboard.admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard.admin');

Route::get('/dashboard/employee', function () {
    return view('dashboard.employee.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard.employee');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

############################# Users Routes ##############################

Route::resource('users', UserController::class)->middleware('auth');

############################# Admin Routes ##############################

Route::resource('admin', AdminController::class)->middleware('auth');

############################# Employee Routes ##############################

Route::resource('employee', EmployeeController::class)->middleware('auth');

############################# Customer Routes ##############################

Route::resource('customer', CustomerController::class)->middleware('auth');

############################ Brand Routes ################################

Route::resource('brand', BrandController::class)->middleware('auth');

########################### Car Model routes ##############################

Route::resource('car_model', CarModelController::class)->middleware('auth');

########################### Categoriesl routes ##############################

Route::resource('categories', CategoryController::class)->middleware('auth');

########################### Cars routes ##############################

Route::resource('cars', CarController::class);

########################## Frontend Management ###########################

Route::get('/index', function () {
    return view('front.index');
});

require __DIR__.'/auth.php';
