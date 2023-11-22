<?php

namespace App\Http\Controllers;

use App\Models\TypeEquipement;
use Illuminate\Http\Request;

class TypeEquipementController extends Controller
{
    public function index()
    {
        // Code pour afficher la page d'accueil
        $typeEquipements = TypeEquipement::orderBy("intitule","asc")->paginate(5);
        return view("typeEquipement.index", compact("typeEquipements"));
    }

    //création de de type
    public function create()
    {
        return view("typeEquipement.create");
    }

    public function store(Request $request)
    {
        // Valider les données envoyées par le formulaire
        $validatedData = $request->validate([
            'intitule' => 'required|unique:type_equipements,intitule',
        ]);

        // Créer un nouveau type à partir des données validées
        TypeEquipement::create($validatedData);

        // Rediriger l'utilisateur vers la page des typeEquipement avec un message de succès
        return redirect()->route('admin')->with("success", "Le bien a été créé avec succès !");
    }

      //édition de bien
    public function edit(TypeEquipement $typeEquipement)
    {
        return view("typeEquipement.edit",compact("typeEquipement"));
    }

    public function update(Request $request, TypeEquipement $typeEquipement)
    {
        $typeEquipementEdit=$typeEquipement->intitule;
        $validatedData = $request->validate([
            'intitule' => 'required|unique:type_Equipements,intitule',
        ]);

        $typeEquipement->update($validatedData);

        return redirect()->route('admin')->with("success", "Le typeEquipement  $typeEquipementEdit a été modifié avec succès !");
    }

    //suppression de typeEquipement
    //injection de dépendance
      public function delete(TypeEquipement $typeEquipement)
    {
        $typeEquipementSupp=$typeEquipement->intitule;
        $typeEquipement->delete();
        return redirect()->route('admin')->with("message", "Le vehicule $typeVehiculeSupp a été supprimé avec succès !");
    }

}
