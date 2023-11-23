<?php

namespace App\Http\Controllers;

use App\Models\Equipement;
use Illuminate\Http\Request;
use App\Models\TypeEquipement;
class EquipementController extends Controller
{
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $equipements = Equipement::orderBy('date_achat', 'desc')->get();
            return view("equipement.index", compact("equipements"));
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            $typeEquipements=TypeEquipement::all();
            return view('equipement.create',compact("typeEquipements"));
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            // Valider les données envoyées par le formulaire
            $validatedData = $request->validate([
                'nom' => 'required',
                'id_type_equipement'=>'required',
            ]);
            $disponible = $request->has('disponible') ? true : false;
              Equipement::create([
                'nom' => $validatedData['nom'],
                'disponible' => $disponible,
                'date_achat' => now(),
                'id_type_equipement' => $validatedData['id_type_equipement'],
            ]);

            // Rediriger vers la page d'accueil avec un message de confirmation
            return redirect()->route('admin.equipementprim')->with('success', 'L\'équipement a été créé avec succès.');
        }
}
