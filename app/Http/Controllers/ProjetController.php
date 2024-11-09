<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    //api

    public function index()
    {
        $projet = Projet::with('tasks')->get();
        return response()->json(
            [
                'data' => $projet
            ],200
        );
    }

    public function store(Request $request)
    {
        try {
            // Validation
            $validatedData = $request->validate([
                'nom' => 'required|max:255',
                'description' => 'required|max:255',
                'date_fin' => 'nullable|date|after:now',
            ]);

            // Création du projet
            $projet = new Projet();
            $projet->nom = $validatedData['nom'];
            $projet->description = $validatedData['description'];
            $projet->date_fin = $validatedData['date_fin'] ?? null;
            $projet->save();

            // Retourner la réponse JSON en cas de succès
            return response()->json(
                [
                    'message' => 'Projet créé avec succès',
                    'data' => $projet
                ],
                201
            );
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Échec de validation',
                'errors' => $e->errors()
            ], 422);
        }
    }


    public function show($id)
    {
        $projet = Projet::find($id);
        if (!$projet) {
            return response()->json([
                'error' => 'Projet introuvable.'
            ], 404);
        }
        return response()->json($projet);
    }

    public function update(Request $request, $id)
    {
        $projet = Projet::find($id);
        if (!$projet) {
            return response()->json([
                'error' => 'Projet introuvable.'
            ], 404);
        }

        try {
            $validatedData = $request->validate([
                'nom' => 'required|max:255',
                'description' => 'required|max:255',
                'date_fin' => 'nullable|date|after:date_debut',
            ]);

            $projet->update($validatedData);

            return response()->json([
                'message' => 'Projet modifié avec succès.',
                'data' => $projet
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Échec de validation',
                'errors' => $e->errors()
            ], 422);
        }
    }
}
