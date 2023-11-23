<?php

namespace App\Http\Controllers;

use App\Models\Pompier;
use Illuminate\Http\Request;

class PompierController extends Controller
{
    public function index()
    {
        // Code pour afficher la page d'accueil
        $pompiers = Pompier::orderBy("nom","asc")->paginate(5);
        return view("pompier.index", compact("pompiers"));
    }

    //création de de type
    public function create()
    {
        return view("pompier.create");
    }

    public function store(Request $request)
    {
        // Valider les données envoyées par le formulaire
        $validatedData = $request->validate([
            'nom' => 'required:pompiers,nom',
            'prenom' => 'required:pompiers,prenom',
            'adresse' => 'required:pompiers,adresse ',
        ]);

        // Créer un nouveau pompier à partir des données validées
        Pompier::create($validatedData);

        // Rediriger l'utilisateur vers la page des pompier avec un message de succès
        return redirect()->route('admin.pompier')->with("success", "Le pompier a été créé avec succès !");
    }

      //édition de bien
    public function edit(Pompier $pompier)
    {
        return view("pompier.edit",compact("pompier"));
    }

    public function update(Request $request, Pompier $pompier)
    {
        $pompierEdit=$pompier->intitule;
        $validatedData = $request->validate([
            'nom' => 'required:pompiers,nom',
            'prenom' => 'required:pompiers,prenom',
            'adresse' => 'required:pompiers,adresse ',
        ]);

        $pompier->update($validatedData);

        return redirect()->route('admin.pompier')->with("success", "Le type $pompierEdit a été modifié avec succès !");
    }

    //suppression de pompier
    //injection de dépendance
      public function delete(Pompier $pompier)
    {
        $pompierSupp=$pompier->intitule;
        $pompier->delete();
        return redirect()->route('admin.pompier')->with("message", "Le type $pompierSupp a été supprimé avec succès !");
    }

}
