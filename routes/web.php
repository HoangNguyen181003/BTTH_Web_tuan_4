<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});
//use App\Http\Controllers\IssueController;

//Route::get('/issues', [IssueController::class, 'index'])->name('issues.index');

use App\Http\Controllers\IssueController;


Route::get('/issues', [IssueController::class, 'index']);

// Hiển thị form để thêm vấn đề mới
Route::get('/issues/create', [IssueController::class, 'create'])->name('issues.create');

// Xử lý việc lưu vấn đề mới
Route::post('/issues', [IssueController::class, 'store'])->name('issues.store');

Route::get('/issues/{id}/edit', [IssueController::class, 'edit'])->name('issues.edit');

Route::put('/issues/{id}', [IssueController::class, 'update'])->name('issues.update');

Route::delete('/issues/{id}', [IssueController::class, 'destroy'])->name('issues.destroy');
