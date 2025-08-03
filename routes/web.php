<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ReportController;

// Default home page (student registration form)
Route::get('/', function () {
    return view('student.index');
});

// Create symbolic link to storage (run once)
Route::get('/link', function () {
    Artisan::call('storage:link');
    return 'Storage link created.';
});

// Student routes
Route::get('/student/index', [StudentController::class, 'registration'])->name('registration');
Route::post('/student/index', [StudentController::class, 'registerPost'])->name('register.post');
Route::post('/hostel/{id}/update-photo', [StudentController::class, 'updatePhoto'])->name('hostel.update.photo');

// Admin authentication
Route::get('/admin/login', [AdminController::class, 'login'])->name('login');
Route::post('/admin/login', [AdminController::class, 'loginPost'])->name('login.post');

// Admin registration
Route::get('/admin/registration', [AdminController::class, 'admin_registration'])->name('admin_registration');
Route::post('/admin/registration', [AdminController::class, 'registrationPost'])->name('registration.post');

// Admin dashboard and views
Route::get('/admin/home', [AdminController::class, 'home'])->name('home');
Route::get('admin/view/{id}', [AdminController::class, 'view'])->name('view');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

// Allocation management
Route::get('allocate/{id}', [AdminController::class, 'updateStatus'])->name('admin.updateStatus');
Route::get('deallocate/{id}', [AdminController::class, 'updateStatusTwo'])->name('admin.updateStatusTwo');

// Reports and filtering
Route::get("/admin/report/report1/{pid}", [ReportController::class, 'report1'])->name('admin.report1');
Route::get('/filters', [AdminController::class, 'printFilter'])->name('filter.printFilter');

// Edit, update, and delete student records
Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('/update/{id}', [AdminController::class, 'update'])->name('record.update');
Route::delete('/delete/{id}', [AdminController::class, 'destroy'])->name('record.destroy');
