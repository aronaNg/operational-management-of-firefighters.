<?php

namespace App\Http\Controllers;
use App\Models\TypeVehicule;
use Illuminate\Http\Request;

class TypeVehiculeController extends Controller
{
    public function index()
    {
        // Code pour afficher la page d'accueil
        $typeVehicules = TypeVehicule::orderBy("intitule","asc")->paginate(5);
        return view("typeVehicule.index", compact("typeVehicules"));
    }

    //création de de type
    public function create()
    {
        return view("typeVehicule.create");
    }

    public function store(Request $request)
    {
        // Valider les données envoyées par le formulaire
        $validatedData = $request->validate([
            'intitule' => 'required|unique:type_vehicules,intitule', // L'intitule est requis et doit être unique dans la table 'typeVehicule'
        ]);

        // Créer un nouveau type à partir des données validées
        TypeVehicule::create($validatedData);

        // Rediriger l'utilisateur vers la page des typeVehicule avec un message de succès
        return redirect()->route('admin')->with("success", "Le bien a été créé avec succès !");
    }

      //édition de bien
    public function edit(TypeVehicule $typeVehicule)
    {
        return view("typeVehicule.edit",compact("typeVehicule"));
    }

    public function update(Request $request, TypeVehicule $typeVehicule)
    {
        $typeVehiculeEdit=$typeVehicule->intitule;
        $validatedData = $request->validate([
            'intitule' => 'required|unique:type_vehicules,intitule',
        ]);

        $typeVehicule->update($validatedData);

        return redirect()->route('admin')->with("success", "Le typeVehicule  $typeVehiculeEdit a été modifié avec succès !");
    }

    //suppression de typeVehicule
    //injection de dépendance
      public function delete(TypeVehicule $typeVehicule)
    {
        $typeVehiculeSupp=$typeVehicule->intitule;
        $typeVehicule->delete();
        return redirect()->route('admin')->with("message", "Le vehicule $typeVehiculeSupp a été supprimé avec succès !");
    }

}
