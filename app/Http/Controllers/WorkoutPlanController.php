<?php
namespace App\Http\Controllers;
use App\Models\WorkoutPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class WorkoutPlanController extends Controller
{
    public function index()
    {
        $workouts = WorkoutPlan::all();
        return view('workout.index', compact('workouts'));
    }
    public function create()
    {
        if (!Auth::check() || Auth::user()->role != 'admin') {
            abort(403, 'Unauthorized');
        }
        return view('workout.create');
    }

    public function store(Request $request)
    {
        if (!Auth::check() || Auth::user()->role != 'admin') {
            abort(403, 'Unauthorized');
        }
        $request->validate([
            'workout_name' => 'required|max:100',
            'category' => 'required|max:100',
            'duration' => 'required|max:100',
            'description' => 'required',
        ]);
        WorkoutPlan::create([
            'workout_name' => $request->workout_name,
            'category' => $request->category,
            'duration' => $request->duration,
            'description' => $request->description,
        ]);
        return redirect()->route('workout-plans.index')
            ->with('success', 'Workout added successfully.');
    }

    public function edit($id)
    {
        if (!Auth::check() || Auth::user()->role != 'admin') {
            abort(403, 'Unauthorized');
        }
        $workout = WorkoutPlan::findOrFail($id);
        return view('workout.edit', compact('workout'));
    }
    public function update(Request $request, $id)
    {
        if (!Auth::check() || Auth::user()->role != 'admin') {
            abort(403, 'Unauthorized');
        }
        $request->validate([
            'workout_name' => 'required|max:100',
            'category' => 'required|max:100',
            'duration' => 'required|max:100',
            'description' => 'required',
        ]);
        $workout = WorkoutPlan::findOrFail($id);
        $workout->update([
            'workout_name' => $request->workout_name,
            'category' => $request->category,
            'duration' => $request->duration,
            'description' => $request->description,
        ]);
        return redirect()->route('workout-plans.index')
            ->with('success', 'Workout updated successfully.');
    }
    public function destroy($id)
    {
        if (!Auth::check() || Auth::user()->role != 'admin') {
            abort(403, 'Unauthorized');
        }
        $workout = WorkoutPlan::findOrFail($id);
        $workout->delete();
        return redirect()->route('workout-plans.index')
            ->with('success', 'Workout deleted successfully.');
    }
}