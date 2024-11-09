<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //api
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        //validation
        try {
            $validatedData = $request->validate([
                'titre' => 'required|max:255',
                'description' => 'required|string',
                'delai' => 'nullable|date|after:now',
                'projet_id' => 'required|integer|exists:projets,id',
            ]);

            $task = New Task();
            $task->titre = $validatedData['titre'];
            $task->description = $validatedData['description'];
            $task->delai = $validatedData['delai'] ?? null;
            $task->projet_id = $validatedData['projet_id'];
            $task->save();
            // Réponse JSON avec message et statut HTTP 201
            return response()->json([
                'message' => 'Tache créé avec succès.',
                'data' => $task
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Échec de validation',
                'errors' => $e->errors()
            ], 422);
        }
    }


    public function show($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json([
                'error' => 'Tache introuvable.'
            ], 404);
        }
        return response()->json($task);
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json([
                'error' => 'Tache introuvable.'
            ], 404);
        }

        //validation
        try {
            $validatedData = $request->validate([
                'titre' => 'required|max:255',
                'description' => 'required|string',
                'delai' => 'nullable|date|after:now',
                'projet_id' => 'required|integer|exists:projets,id',
            ]);

            $task = New Task($validatedData);
            // Réponse JSON avec message et statut HTTP 200
            return response()->json([
                'message' => 'Tache modifiée avec succès.',
                'data' => $task
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Échec de validation',
                'errors' => $e->errors()
            ], 422);
        }
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json([
                'error' => 'Tache introuvable.'
            ], 404);
        }

        $task->delete();
        // Réponse JSON avec message et statut HTTP 204
        return response()->json([
            'message' => 'Tache supprimée avec succès.'
        ], 204);
    }
}
