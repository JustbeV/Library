<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\AdminMangaController;
use App\Http\Controllers\AdminChapterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminAnimeController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

// Welcome page
use App\Models\Manga;
use App\Models\Anime;

Route::get('/', function () {
    return view('welcome', [
        'mangaCount' => Manga::count(),
        'animeCount' => Anime::count(),
    ]);
})->name('welcome'); // 

// Public Manga routes (read-only)
Route::get('/mangas', [MangaController::class, 'index'])->name('mangas.index');
Route::get('/mangas/{manga}', [MangaController::class, 'show'])->name('mangas.show');
Route::get('/mangas/{manga}/chapters/{chapter}', [MangaController::class, 'showChapter'])->name('mangas.chapter');

// Public Anime routes (read-only)
Route::get('/animes', [AnimeController::class, 'index'])->name('animes.index');
Route::get('/animes/{anime}', [AnimeController::class, 'show'])->name('animes.show');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
|
| Only accessible to logged-in users (auth middleware)
|
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function() {

        // ✅ ADD THIS
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Admin Chapters
        Route::prefix('mangas/{manga}/chapters')
            ->name('mangas.chapters.')
            ->group(function () {
                Route::get('/', [AdminChapterController::class, 'index'])->name('index');
                Route::get('create', [AdminChapterController::class, 'create'])->name('create');
                Route::post('/', [AdminChapterController::class, 'store'])->name('store');
                Route::get('{chapter}/edit', [AdminChapterController::class, 'edit'])->name('edit');
                Route::put('{chapter}', [AdminChapterController::class, 'update'])->name('update');
                Route::delete('{chapter}', [AdminChapterController::class, 'destroy'])->name('destroy');
            });

        Route::resource('animes', AdminAnimeController::class);
        Route::resource('mangas', AdminMangaController::class);
});

/*
|--------------------------------------------------------------------------
| PROFILE ROUTES (optional)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Dashboard route (optional)
Route::get('/dashboard', function () {
    return view('dashboard', [
        'mangaCount' => \App\Models\Manga::count(),
        'animeCount' => \App\Models\Anime::count(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

