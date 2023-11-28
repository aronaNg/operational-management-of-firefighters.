<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;
use App\Models\TypeIncident;

class IncidentController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incidents = Incident::orderBy('date_heure', 'desc')->paginate(100);
        return view("incident.index", compact("incidents"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $typeIncidents=TypeIncident::all();
        return view('incident.create',compact("typeIncidents"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données envoyées par le formulaire
        $validatedData = $request->validate([
            'ville' => 'required',
            'id_type_incident'=>'required',
        ]);
        Incident::create([
            'ville' => $validatedData['ville'],
            'date_heure' => now(),
            'id_type_incident' => $validatedData['id_type_incident'],
        ]);

        return redirect()->route('admin.incidentprim')->with('success', 'L incident a été créé avec succès.');
    }


}
