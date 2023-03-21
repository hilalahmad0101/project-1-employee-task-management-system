<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\TaskController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {
    Route::middleware(['guest:admin'])->group(function () {
        Route::get('/login', [LoginController::class, 'index'])->name('admin.auth.login');
        Route::post('/login/post', [LoginController::class, 'login'])->name('admin.login');
    });
});

Route::middleware(['auth:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        // employee routes
        Route::get('/employee/list', [EmployeeController::class, 'index'])->name('admin.employee.list');
        Route::get('/employee/add', [EmployeeController::class, 'add'])->name('admin.employee.add');
        Route::post('/employee/crate', [EmployeeController::class, 'create'])->name('admin.employee.create');
        Route::post('/employee/delete', [EmployeeController::class, 'delete'])->name('admin.employee.delete');
        Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit'])->name('admin.employee.edit');
        Route::post('/employee/update', [EmployeeController::class, 'update'])->name('admin.employee.update');


        // Task routes
        Route::get('/tasks/list', [TaskController::class, 'index'])->name('admin.task.list');
        Route::get('/tasks/add', [TaskController::class, 'add'])->name('admin.task.add');
        Route::post('/tasks/create', [TaskController::class, 'create'])->name('admin.task.create');
        Route::post('/tasks/delete', [TaskController::class, 'delete'])->name('admin.task.delete');
        Route::get('/tasks/edit/{id}', [TaskController::class, 'edit'])->name('admin.task.edit');
        Route::post('/tasks/update', [TaskController::class, 'update'])->name('admin.task.update');


        // department routes

        Route::get('/departments/list', [DepartmentController::class, 'index'])->name('admin.department.list');
        Route::get('/departments/add', [DepartmentController::class, 'add'])->name('admin.department.add');
        Route::post('/departments/store', [DepartmentController::class, 'store'])->name('admin.department.store');
        Route::post('/departments/delete', [DepartmentController::class, 'delete'])->name('admin.department.delete');
        Route::get('/departments/edit/{id}', [DepartmentController::class, 'edit'])->name('admin.department.edit');
        Route::post('/departments/update', [DepartmentController::class, 'update'])->name('admin.department.update');

        // Admin Crud

        Route::get('/admin/list', [AdminController::class, 'index'])->name('admin.admin.list');
        Route::get('/admin/add', [AdminController::class, 'add'])->name('admin.admin.add');
        Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.admin.store');
        Route::post('/admin/delete', [AdminController::class, 'delete'])->name('admin.admin.delete');
        Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.admin.edit');
        Route::post('/admin/update', [AdminController::class, 'update'])->name('admin.admin.update');
    });
});

