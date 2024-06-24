<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CombinedController;
use App\Http\Controllers\UserTopicController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return view('welcome');
});

//ADMIN/PANITIA
// Rute untuk dashboard
Route::get('/dashboard', [CombinedController::class, 'showDashboard'])->name('dashboard');

// Topic routes
Route::get('topics', [TopicController::class, 'indexTopics'])->name('combined.topics.dashboard');
Route::get('topics/create', [TopicController::class, 'createTopics'])->name('topics.create');
Route::post('topics', [TopicController::class, 'storeTopics'])->name('topics.store');
Route::get('topics/{id}', [TopicController::class, 'showTopics'])->name('topics.show');
Route::get('topics/{id}/edit', [TopicController::class, 'editTopics'])->name('topics.edit');
Route::put('topics/{id}', [TopicController::class, 'updateTopics'])->name('topics.update');
Route::delete('topics/{id}', [TopicController::class, 'destroyTopics'])->name('topics.destroy');


// Post routes
Route::get('posts', [PostController::class, 'indexPosts'])->name('combined.posts.dashboard');
Route::get('posts/create', [PostController::class, 'createPosts'])->name('posts.create');
Route::post('posts', [PostController::class, 'storePosts'])->name('posts.store');
Route::get('posts/{id}/edit', [PostController::class, 'editPosts'])->name('posts.edit');
Route::put('posts/{id}', [PostController::class, 'updatePosts'])->name('posts.update');
Route::delete('posts/{id}', [PostController::class, 'destroyPosts'])->name('posts.destroy');

//route untuk profile panitia
Route::get('/profiles', [ProfileController::class, 'profile'])->name('profiles');
Route::get('/profiles/create', [ProfileController::class, 'create'])->name('profiles.create');
Route::post('/profiles', [ProfileController::class, 'store'])->name('profiles.store');
Route::get('/profiles/{profile}/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
Route::put('/profiles/{profile}', [ProfileController::class, 'update'])->name('profiles.update');
Route::delete('/profiles/{profile}', [ProfileController::class, 'destroy'])->name('profiles.destroy');

//route untuk formulir donasi pada masyarakat
Route::get('/donasi/create', [DonasiController::class, 'create'])->name('donasi.create');
Route::post('/donasi/store', [DonasiController::class, 'store'])->name('donasi.store');
Route::get('/laporan-donasi', [DonasiController::class, 'laporan'])->name('donasi.laporan');

//route lomba pada panitia
Route::get('lombas', [LombaController::class, 'lomba'])->name('lombas.lomba');
Route::get('lombas/create', [LombaController::class, 'create'])->name('lombas.create');
Route::post('lombas/store', [LombaController::class, 'store'])->name('lombas.store');
Route::delete('lombas/{lomba}', [LombaController::class, 'destroy'])->name('lombas.destroy');

// Route untuk masyarakat
Route::group(['prefix' => 'masyarakat'], function () {
    Route::get('pendaftaran/create', [PendaftaranController::class, 'create'])->name('pendaftaran.create');
    Route::post('pendaftaran/store', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
});

// Route untuk admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('laporan', [LaporanController::class, 'laporan'])->name('panitia.laporanpendaftar');
});

