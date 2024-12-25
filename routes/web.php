<?php
use App\Http\Controllers\AdController;
use Illuminate\Support\Facades\Route;






Route::middleware(['auth', 'admin'])->prefix('adminpanel')->group(function () {
    Route::get('/', function () {
        return view('moonshine::index');
    });
});




Route::middleware('auth')->group(function () {
Route::get('/', [AdController::class, "create"])->name("home");
Route::get('/home', [AdController::class, "index"])->name("house");
Route::resource('ads', \App\Http\Controllers\AdController::class);
Route::get('/search',[\App\Http\Controllers\AdController::class ,'find']);
Route::get('/ads/{id}' ,[AdController::class,'show']);
Route::get('/ads/{id}/download-pdf', [AdController::class, 'generatePDF'])->name('generate.pdf');
Route::get('/ads/{ad}/edit', [AdController::class, 'edit'])->name('ads.edit');
Route::get('/hisob',[\App\Http\Controllers\ColorController::class, 'hisob'])->name('hisob');
Route::post('/hisob', [\App\Http\Controllers\ColorController::class, 'hisobPost'])->name('hisob.post');


});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//     Route::post('/logout', [ProfileController::class, 'logout'])->name('logout');

// });





require __DIR__.'/auth.php';
