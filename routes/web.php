<?php
use App\Models\Ad;
use App\Http\Controllers\AdController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AdController::class, "index"])->name("home");

Route::middleware('auth')->group(function () {
Route::resource('ads', \App\Http\Controllers\AdController::class);
Route::get('/search',[\App\Http\Controllers\AdController::class ,'find']);
Route::post("/ads/{id}/bookmark",[\App\Http\Controllers\UserController::class ,  "toggleBookmark"]);
Route::get('/my/profile',[\App\Http\Controllers\UserController::class, 'profile']);
Route::get('/ads/{id}' ,[AdController::class,'show']);
Route::get('/ads/{id}/download-pdf', [AdController::class, 'generatePDF'])->name('generate.pdf');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/logout', [ProfileController::class, 'logout'])->name('logout');

});





require __DIR__.'/auth.php';
