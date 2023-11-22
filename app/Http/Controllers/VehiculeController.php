<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;
use App\Models\TypeVehicule;
class VehiculeController extends Controller
{


        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $vehicules = Vehicule::orderBy('date_achat', 'desc')->get();
            return view("vehicule.index", compact("vehicules"));
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            $typeVehicules=TypeVehicule::all();
            return view('vehicule.create',compact("typeVehicules"));
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            // Valider les données envoyées par le formulaire
            $validatedData = $request->validate([
                'immatriculation' => 'required',
                'id_type_vehicule'=>'required',
            ]);
            $disponible = $request->has('disponible') ? true : false;
              Vehicule::create([
                'immatriculation' => $validatedData['immatriculation'],
                'disponible' => $disponible,
                'date_achat' => now(),
                'id_type_vehicule' => $validatedData['id_type_vehicule'],
            ]);

            // Rediriger vers la page d'accueil avec un message de confirmation
            return redirect()->route('admin.vehicule')->with('success', 'Le véhicule a été créé avec succès.');
        }




    /**
     * Display the specified resource.
     */
    public function show(Vehicule $vehicule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicule $vehicule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicule $vehicule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicule $vehicule)
    {
        //
    }
}
