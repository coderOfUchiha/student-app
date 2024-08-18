<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', [StudentController::class, 'index'])->name('student.index');
Route::get('student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('student/add', [StudentController::class, 'add'])->name('student.add');
Route::get('student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::put('student/{id}/update', [StudentController::class, 'update'])->name('student.update');
Route::get('student/{id}/delete', [StudentController::class, 'delete'])->name('student.delete');
Route::get('student/search', [StudentController::class, 'search'])->name('student.search');






