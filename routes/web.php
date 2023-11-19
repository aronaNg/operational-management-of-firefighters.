<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeVehiculeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("accueil");


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/admin', [TypeVehiculeController::class, 'index'])->name("admin");
Route::get('/dashboard/admin/create', [TypeVehiculeController::class, 'create'])->name("admin.create");
Route::post('/dashboard/admin/create', [TypeVehiculeController::class, 'store'])->name("admin.store");

//route pour l'édition
Route::get('/dashboard/admin/{typeVehicule}', [TypeVehiculeController::class, 'edit'])->name("admin.edit");
Route::put('/dashboard/admin/{typeVehicule}', [TypeVehiculeController::class, 'update'])->name("admin.update");
//route pour la suppression
Route::delete('/admin/{typeVehicule}', [TypeVehiculeController::class, 'delete'])->name("admin.delete");
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
