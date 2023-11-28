<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeVehiculeController;
use App\Http\Controllers\TypeIncidentController;
use App\Http\Controllers\TypeEquipementController;
use App\Http\Controllers\EquipementController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\InterventionController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\CertificatController;
use App\Http\Controllers\PompierController;use
 App\Http\Controllers\UsersManagementController;



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

Route::get('/dashboard/typeIncident', [TypeIncidentController::class, 'index'])->middleware(['auth', 'verified'])->name("admin.incident");
Route::get('/dashboard/typeIncident/create', [TypeIncidentController::class, 'create'])->middleware(['auth', 'verified'])->name("admin.incident.create");
Route::post('/dashboard/typeIncident/create', [TypeIncidentController::class, 'store'])->middleware(['auth', 'verified'])->name("admin.incident.store");
Route::get('/dashboard/typeIncident/{typeIncident}', [TypeIncidentController::class, 'edit'])->middleware(['auth', 'verified'])->name("admin.incident.edit");
Route::put('/dashboard/typeIncident/{typeIncident}', [TypeIncidentController::class, 'update'])->middleware(['auth', 'verified'])->name("admin.incident.update");
Route::delete('/typeIncident/{typeIncident}', [TypeIncidentController::class, 'delete'])->middleware(['auth', 'verified']) ->name("admin.incident.delete");

//EQUIPEMENTS
Route::get('/dashboard/typeEquipements', [TypeEquipementController::class, 'index'])->middleware(['auth', 'verified'])->name("admin.equipement");
Route::get('/dashboard/typeEquipement/create', [TypeEquipementController::class, 'create'])->middleware(['auth', 'verified'])->name("admin.equipement.create");
Route::post('/dashboard/typeEquipement/create', [TypeEquipementController::class, 'store'])->middleware(['auth', 'verified'])->name("admin.equipement.store");
Route::get('/dashboard/typeEquipement/{typeEquipement}', [TypeEquipementController::class, 'edit'])->middleware(['auth', 'verified'])->name("admin.equipement.edit");
Route::put('/dashboard/typeEquipement/{typeEquipement}', [TypeEquipementController::class, 'update'])->middleware(['auth', 'verified'])->name("admin.equipement.update");
Route::delete('/typeEquipement/{typeEquipement}', [TypeEquipementController::class, 'delete'])->middleware(['auth', 'verified']) ->name("admin.equipement.delete");

// VEHICULES
Route::get('/dashboard/vehicules', [VehiculeController::class, 'index'])->middleware(['auth', 'verified'])->name("admin.vehicule");
Route::get('/dashboard/vehicule/create', [VehiculeController::class, 'create'])->middleware(['auth', 'verified'])->name("admin.vehicule.create");
Route::post('/dashboard/vehicule/create', [VehiculeController::class, 'store'])->middleware(['auth', 'verified'])->name("admin.vehicule.store");
// Route::get('/dashboard/vehicule/{typeVehicule}', [VehiculeController::class, 'edit'])->middleware(['auth', 'verified'])->name("admin.vehicule.edit");
// Route::put('/dashboard/vehicule/{typeVehicule}', [VehiculeController::class, 'update'])->middleware(['auth', 'verified'])->name("admin.vehicule.update");
// Route::delete('/vehicule/{typeVehicule}', [VehiculeController::class, 'delete'])->middleware(['auth', 'verified']) ->name("admin.vehicule.delete");

// Incidents
Route::get('/dashboard/incidents', [IncidentController::class, 'index'])->middleware(['auth', 'verified'])->name("admin.incidentprim");
Route::get('/dashboard/incident/create', [IncidentController::class, 'create'])->middleware(['auth', 'verified'])->name("admin.incidentprim.create");
Route::post('/dashboard/incident/create', [IncidentController::class, 'store'])->middleware(['auth', 'verified'])->name("admin.incidentprim.store");

// POMPIERS
Route::get('/dashboard/pompiers', [PompierController::class, 'index'])->middleware(['auth', 'verified'])->name("admin.pompier");
Route::get('/dashboard/pompier/create', [PompierController::class, 'create'])->middleware(['auth', 'verified'])->name("admin.pompier.create");
Route::post('/dashboard/pompier/create', [PompierController::class, 'store'])->middleware(['auth', 'verified'])->name("admin.pompier.store");
Route::get('/dashboard/pompier/{pompier}', [PompierController::class, 'edit'])->middleware(['auth', 'verified'])->name("admin.pompier.edit");
Route::put('/dashboard/pompier/{pompier}', [PompierController::class, 'update'])->middleware(['auth', 'verified'])->name("admin.pompier.update");
Route::delete('/dashboard/pompier/{pompier}', [PompierController::class, 'delete'])->middleware(['auth', 'verified']) ->name("admin.pompier.delete");

// Equipements
Route::get('/dashboard/equipements', [EquipementController::class, 'index'])->middleware(['auth', 'verified'])->name("admin.equipementprim");
Route::get('/dashboard/equipement/create', [EquipementController::class, 'create'])->middleware(['auth', 'verified'])->name("admin.equipementprim.create");
Route::post('/dashboard/equipement/create', [EquipementController::class, 'store'])->middleware(['auth', 'verified'])->name("admin.equipementprim.store");
Route::get('/dashboard/equipement/{equipement}', [EquipementController::class, 'edit'])->middleware(['auth', 'verified'])->name("admin.equipementprim.edit");
Route::put('/dashboard/equipement/{equipement}', [EquipementController::class, 'update'])->middleware(['auth', 'verified'])->name("admin.equipementprim.update");
Route::delete('/equipement/{equipement}', [EquipementController::class, 'delete'])->middleware(['auth', 'verified']) ->name("admin.equipementprim.delete");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// // users
// Route::get('/users', [UsersManagementController::class, 'index'])->middleware(['web', 'auth'])->name("users");
// Route::post('/users', [UsersManagementController::class, 'store'])->middleware(['web', 'auth'])->name("users.store");
// Route::get('/users/create', [UsersManagementController::class, 'create'])->middleware(['web', 'auth'])->name("users.create");
// Route::get('/users/{user}', [UsersManagementController::class, 'show'])->middleware(['web', 'auth'])->name("users.show");
// Route::get('/users/{user}/edit', [UsersManagementController::class, 'edit'])->middleware(['web', 'auth'])->name("users.edit");
// Route::put('/users/{user}', [UsersManagementController::class, 'update'])->middleware(['web', 'auth'])->name("users.update");
// Route::delete('/users/{user}', [UsersManagementController::class, 'delete'])->middleware(['web', 'auth']) ->name("users.destroy");


require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
