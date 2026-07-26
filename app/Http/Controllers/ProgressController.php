<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{

    // Show Progress
    public function index()
    {
        if (Auth::user()->role == 'admin') {

            $progress = Progress::with('user')
                ->latest('workout_date')
                ->get();

        } else {

            $progress = Progress::where('user_id', Auth::id())
                ->latest('workout_date')
                ->get();
        }

        return view('progress.index', compact('progress'));
    }
    // Add Form (Admin Only)
    public function create()
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }
        // Get all users for dropdown
        $users = User::where('role','user')->get();
        return view('progress.create', compact('users'));
    }
    // Store (Admin Only)
    public function store(Request $request)
    {

        if (Auth::user()->role != 'admin') {

            abort(403);

        }
        $request->validate([
            'user_id' => 'required',
            'weight' => 'required|numeric|min:20|max:500',
            'height' => 'required|numeric|min:50|max:300',
            'workout_date' => 'required|date'
        ]);
        $height = $request->height / 100;
        $bmi = round(
            $request->weight / ($height * $height),
            2
        );
        Progress::create([
            'user_id' => $request->user_id,
            'weight' => $request->weight,
            'height' => $request->height,
            'bmi' => $bmi,
            'workout_date' => $request->workout_date,
        ]);
        return redirect()
            ->route('progress.index')
            ->with('success','Progress Added Successfully');
    }
    // Edit (Admin Only)
    public function edit($id)
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }
        $progress = Progress::findOrFail($id);
        return view('progress.edit', compact('progress'));
    }
    // Update (Admin Only)
    public function update(Request $request, $id)
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }
        $request->validate([
            'weight'=>'required|numeric|min:20|max:500',
            'height'=>'required|numeric|min:50|max:300',
            'workout_date'=>'required|date'
        ]);
        $progress = Progress::findOrFail($id);
        $height = $request->height / 100;
        $bmi = round(
            $request->weight / ($height * $height),
            2
        );
        $progress->update([
            'weight'=>$request->weight,
            'height'=>$request->height,
            'bmi'=>$bmi,
            'workout_date'=>$request->workout_date,
        ]);
        return redirect()
            ->route('progress.index')
            ->with('success','Progress Updated Successfully');
    }
    // Delete (Admin Only)
    public function destroy($id)
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }
        $progress = Progress::findOrFail($id);
        $progress->delete();
        return redirect()
            ->route('progress.index')
            ->with('success','Progress Deleted Successfully');

    }

}