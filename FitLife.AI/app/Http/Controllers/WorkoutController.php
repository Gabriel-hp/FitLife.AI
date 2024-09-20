<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use Illuminate\Http\Request;
use App\Services\GeminiService;

class WorkoutController extends Controller
{
    protected $geminiService; // Declarando a propriedade

    public function __construct(GeminiService $geminiService)
    {
        $this->geminiService = $geminiService;
    }

    public function generateWorkoutDescription($id)
    {
        $workout = Workout::find($id);
        if (!$workout) {
            return response()->json(['error' => 'Workout not found'], 404);
        }

        $prompt = "Generate a detailed description for the following workout: " . $workout->name;
        $description = $this->geminiService->generateText($prompt);

        return response()->json(['description' => $description]);
    }

    public function index()
    {
        $workouts = Workout::with('exercises')->get();
        return response()->json($workouts);
    }

    public function store(Request $request)
    {
        $workout = Workout::create($request->all());
        return response()->json($workout);
    }

    public function show($id)
    {
        $workout = Workout::with('exercises')->find($id);
        return response()->json($workout);
    }

    public function update(Request $request, $id)
    {
        $workout = Workout::find($id);
        $workout->update($request->all());
        return response()->json($workout);
    }

    public function destroy($id)
    {
        $workout = Workout::find($id);
        $workout->delete();
        return response()->json('Workout deleted successfully');
    }
}
