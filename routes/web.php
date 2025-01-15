<?php
use App\Http\Controllers\AdController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\DoorTypeController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/adminpanel', function () {
        return view('moonshine::index');
    });
});



Route::middleware('auth')->group(function () {
Route::get('/', [AdController::class, "create"])->name("home");
Route::get('/home', [AdController::class, "index"])->name("house");
Route::resource('ads', \App\Http\Controllers\AdController::class);
Route::get('/search',[\App\Http\Controllers\DoorTypeController::class ,'find']);
Route::get('/ads/{id}' ,[AdController::class,'show']);
Route::get('/ads/{id}/download-pdf', [DoorTypeController::class, 'generatePDF'])->name('generate.pdf');
Route::get('/ads/{ad}/edit', [AdController::class, 'edit'])->name('ads.edit');
Route::get('/hisob', [ColorController::class, 'hisob'])->name('hisob'); 
Route::post('/hisob', [ColorController::class, 'hisob'])->name('hisob.post');


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
