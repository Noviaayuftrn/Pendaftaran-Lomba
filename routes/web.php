<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserTopicController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TopicController;

Route::get('/', function () {
    return view('dashboard');
});

//ADMIN/PANITIA
// Topic (informasi) routes
Route::get('/dashboard', [TopicController::class, 'informasi'])->name('dashboard');
Route::get('topics/create', [TopicController::class, 'createTopic'])->name('topics.create');
Route::post('topics', [TopicController::class, 'storeTopic'])->name('topics.store');
/*Route::get('topics/{id}', [TopicController::class, 'showTopic'])->name('topics.show');*/
Route::get('topics/{id}/edit', [TopicController::class, 'editTopic'])->name('topics.edit');
Route::put('topics/{id}', [TopicController::class, 'updateTopic'])->name('topics.update');
Route::delete('topics/{id}', [TopicController::class, 'destroyTopic'])->name('topics.destroy');

// Post (dokumentasi)routes
Route::get('/dokumentasi', [PostController::class, 'dokumentasi'])->name('dokumentasi');
Route::get('/panitia/create', [PostController::class, 'createPost'])->name('posts.create');
Route::post('/panitia/store', [PostController::class, 'storePost'])->name('posts.store');
Route::get('/panitia/edit/{id}', [PostController::class, 'editPost'])->name('posts.edit');
Route::put('/panitia/update/{id}', [PostController::class, 'updatePost'])->name('posts.update');
Route::delete('/panitia/destroy/{id}', [PostController::class, 'destroyPost'])->name('posts.destroy');

//route untuk profile panitia
Route::get('/profiles', [ProfileController::class, 'profile'])->name('profiles');
Route::get('/profiles/create', [ProfileController::class, 'create'])->name('profiles.create');
Route::post('/profiles', [ProfileController::class, 'store'])->name('profiles.store');
Route::get('/profiles/{profile}/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
Route::put('/profiles/{profile}', [ProfileController::class, 'update'])->name('profiles.update');
Route::delete('/profiles/{profile}', [ProfileController::class, 'destroy'])->name('profiles.destroy');

//route untuk formulir donasi pada masyarakat
Route::get('/donasi', [DonasiController::class, 'create'])->name('donasi.create');
Route::post('/donasi/store', [DonasiController::class, 'store'])->name('donasi.store');
Route::delete('/donasi/{donasi}', [DonasiController::class, 'destroy'])->name('donasi.destroy');
Route::get('/laporan-donasi', [DonasiController::class, 'laporan'])->name('donasi.laporan');
Route::get('donaturs', [DonasiController::class, 'donatur'])->name('donaturs');

//route lomba pada panitia
Route::get('lombas', [LombaController::class, 'lomba'])->name('lombas.lomba');
Route::get('lombas/create', [LombaController::class, 'create'])->name('lombas.create');
Route::post('lombas/store', [LombaController::class, 'store'])->name('lombas.store');
Route::delete('lombas/{lomba}', [LombaController::class, 'destroy'])->name('lombas.destroy');

// Route untuk masyarakat 
/*
Route::get('/pendaftaran', [PendaftaranController::class, 'create'])->name('pendaftaran.create');
Route::post('pendaftaran/store', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
Route::delete('/pendaftaran/{id}', [PendaftaranController::class, 'destroy'])->name('pendaftaran.destroy');
Route::get('/laporanpendaftar', [PendaftaranController::class, 'laporanPendaftar'])->name('panitia.laporanpendaftar');*/