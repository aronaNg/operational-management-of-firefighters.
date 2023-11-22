<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeVehiculeController;
use App\Http\Controllers\TypeIncidentController;
use App\Http\Controllers\TypeEquipementController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\InterventionController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\CertificatController;
use App\Http\Controllers\PompierController;

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
// Type VEHICULES
Route::get('/dashboard/typeVehicules', [TypeVehiculeController::class, 'index'])->middleware(['auth', 'verified'])->name("admin");
Route::get('/dashboard/typeVehicule/create', [TypeVehiculeController::class, 'create'])->middleware(['auth', 'verified'])->name("admin.create");
Route::post('/dashboard/typeVehicule/create', [TypeVehiculeController::class, 'store'])->middleware(['auth', 'verified'])->name("admin.store");

//route pour l'édition
Route::get('/dashboard/typeVehicule/{typeVehicule}', [TypeVehiculeController::class, 'edit'])->middleware(['auth', 'verified'])->name("admin.edit");
Route::put('/dashboard/typeVehicule/{typeVehicule}', [TypeVehiculeController::class, 'update'])->middleware(['auth', 'verified'])->name("admin.update");
//route pour la suppression
Route::delete('/typeVehicule/{typeVehicule}', [TypeVehiculeController::class, 'delete'])->middleware(['auth', 'verified']) ->name("admin.delete");

// INCIDENTS

Route::get('/dashboard/incidents', [TypeIncidentController::class, 'index'])->middleware(['auth', 'verified'])->name("admin.incident");
Route::get('/dashboard/incidents/create', [TypeIncidentController::class, 'create'])->middleware(['auth', 'verified'])->name("admin.incident.create");
Route::post('/dashboard/incidents/create', [TypeIncidentController::class, 'store'])->middleware(['auth', 'verified'])->name("admin.incident.store");
Route::get('/dashboard/incidents/{typeIncident}', [TypeIncidentController::class, 'edit'])->middleware(['auth', 'verified'])->name("admin.incident.edit");
Route::put('/dashboard/incidents/{typeIncident}', [TypeIncidentController::class, 'update'])->middleware(['auth', 'verified'])->name("admin.incident.update");
Route::delete('/incidents/{typeIncident}', [TypeIncidentController::class, 'delete'])->middleware(['auth', 'verified']) ->name("admin.incident.delete");

//EQUIPEMENTS
Route::get('/dashboard/equipements', [TypeEquipementController::class, 'index'])->middleware(['auth', 'verified'])->name("admin.equipement");
Route::get('/dashboard/equipements/create', [TypeEquipementController::class, 'create'])->middleware(['auth', 'verified'])->name("admin.equipement.create");
Route::post('/dashboard/equipements/create', [TypeEquipementController::class, 'store'])->middleware(['auth', 'verified'])->name("admin.equipement.store");
Route::get('/dashboard/equipements/{typeEquipement}', [TypeEquipementController::class, 'edit'])->middleware(['auth', 'verified'])->name("admin.equipement.edit");
Route::put('/dashboard/equipements/{typeEquipement}', [TypeEquipementController::class, 'update'])->middleware(['auth', 'verified'])->name("admin.equipement.update");
Route::delete('/equipements/{typeEquipement}', [TypeEquipementController::class, 'delete'])->middleware(['auth', 'verified']) ->name("admin.equipement.delete");

// VEHICULES
Route::get('/dashboard/vehicules', [TypeVehiculeController::class, 'index'])->middleware(['auth', 'verified'])->name("admin.vehicule");
Route::get('/dashboard/vehicule/create', [TypeVehiculeController::class, 'create'])->middleware(['auth', 'verified'])->name("admin.vehicule.create");
Route::post('/dashboard/vehicule/create', [TypeVehiculeController::class, 'store'])->middleware(['auth', 'verified'])->name("admin.vehicule.store");
Route::get('/dashboard/vehicule/{typeVehicule}', [TypeVehiculeController::class, 'edit'])->middleware(['auth', 'verified'])->name("admin.vehicule.edit");
Route::put('/dashboard/vehicule/{typeVehicule}', [TypeVehiculeController::class, 'update'])->middleware(['auth', 'verified'])->name("admin.vehicule.update");
Route::delete('/vehicule/{typeVehicule}', [TypeVehiculeController::class, 'delete'])->middleware(['auth', 'verified']) ->name("admin.vehicule.delete");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
