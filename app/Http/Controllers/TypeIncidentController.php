<?php

namespace App\Http\Controllers;

use App\Models\TypeIncident;
use Illuminate\Http\Request;

class TypeIncidentController extends Controller
{
    public function index()
    {
        // Code pour afficher la page d'accueil
        $typeIncidents = TypeIncident::orderBy("intitule","asc")->paginate(5);
        return view("typeIncident.index", compact("typeIncidents"));
    }

    //création de de type
    public function create()
    {
        return view("typeIncident.create");
    }

    public function store(Request $request)
    {
        // Valider les données envoyées par le formulaire
        $validatedData = $request->validate([
            'intitule' => 'required|unique:type_incidents,intitule',
        ]);

        // Créer un nouveau type à partir des données validées
        TypeIncident::create($validatedData);

        // Rediriger l'utilisateur vers la page des typeIncident avec un message de succès
        return redirect()->route('admin.incident')->with("success", "Le bien a été créé avec succès !");
    }

      //édition de bien
    public function edit(TypeIncident $typeIncident)
    {
        return view("typeIncident.edit",compact("typeIncident"));
    }

    public function update(Request $request, TypeIncident $typeIncident)
    {
        $typeIncidentEdit=$typeIncident->intitule;
        $validatedData = $request->validate([
            'intitule' => 'required|unique:type_incidents,intitule',
        ]);

        $typeIncident->update($validatedData);

        return redirect()->route('admin.incident')->with("success", "Le type $typeIncidentEdit a été modifié avec succès !");
    }

    //suppression de typeIncident
    //injection de dépendance
      public function delete(TypeIncident $typeIncident)
    {
        $typeIncidentSupp=$typeIncident->intitule;
        $typeIncident->delete();
        return redirect()->route('admin.incident')->with("message", "Le type $typeIncidentSupp a été supprimé avec succès !");
    }

}
