<?php

namespace App\Http\Controllers;

use App\Models\Pompier;
use App\Models\Disponibilite;
use App\Models\Competence;
use App\Models\Certification;

use Illuminate\Http\Request;

class PompierController extends Controller
{
    public function index()
    {
        // Code pour afficher la page d'accueil
        $pompiers = Pompier::with('disponibilites', 'competences', 'certifications')->get();
        return view("user", compact("pompiers"));
    }

    //création de de type
    public function create()
    {
        // Récupérer toutes les disponibilités, compétences et certifications pour les formulaires
        $disponibilites = Disponibilite::all();
        $competences = Competence::all();
        $certifications = Certification::all();

        // Retourner la vue pour créer un pompier
        return view('pompier.create', compact('disponibilites', 'competences', 'certifications'));
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
        ]);

        // Créer un nouveau pompier avec les données du formulaire
        $pompier = Pompier::create($request->only(['nom', 'prenom','adresse']));

        // Attacher les disponibilités, compétences et certifications au pompier
        $pompier->disponibilites()->attach($request->input('disponibilites'));
        $pompier->competences()->attach($request->input('competences'));
        $pompier->certifications()->attach($request->input('certifications'));

        // Rediriger vers la liste des pompiers avec un message de succès
        return redirect()->route('admin.pompier')->with('success', 'Pompier ajouté avec succès');
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
