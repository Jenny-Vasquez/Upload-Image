<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadManager;

Route::resource('images', UploadManager::class);
Route::get('/', [UploadManager::class,'index']);
Route::post('/upload', [UploadManager::class,'upload'])->name('upload');
Route::delete('/images/{image}', [UploadManager::class, 'destroy'])->name('images.destroy');
