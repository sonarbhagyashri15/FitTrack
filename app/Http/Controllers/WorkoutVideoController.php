<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WorkoutVideo;
class WorkoutVideoController extends Controller
{
    public function index()
    {
        $videos = WorkoutVideo::latest()->get();
        return view('workout-videos.index', compact('videos'));
    }
    public function create()
    {
        if (!Auth::check() || Auth::user()->role != 'admin') {
            abort(403, 'Unauthorized');
        }
        return view('workout-videos.create');
    }
    public function store(Request $request)
    {
        if (!Auth::check() || Auth::user()->role != 'admin') {
            abort(403, 'Unauthorized');
        }
        $request->validate([
            'title' => 'required|max:100',
            'category' => 'required|max:100',
            'youtube_url' => 'required|url',
            'description' => 'required',
        ]);
        WorkoutVideo::create([
            'title' => $request->title,
            'category' => $request->category,
            'youtube_url' => $request->youtube_url,
            'description' => $request->description,
        ]);
        return redirect()
            ->route('workout-videos.index')
            ->with('success', 'Workout Video Added Successfully');
    }
    public function show($id)
    {
        $video = WorkoutVideo::findOrFail($id);
        return view('workout-videos.show', compact('video'));
    }
    public function edit($id)
    {
        if (!Auth::check() || Auth::user()->role != 'admin') {
            abort(403, 'Unauthorized');
        }
        $video = WorkoutVideo::findOrFail($id);
        return view('workout-videos.edit', compact('video'));
    }
    public function update(Request $request, $id)
    {
        if (!Auth::check() || Auth::user()->role != 'admin') {
            abort(403, 'Unauthorized');
        }
        $video = WorkoutVideo::findOrFail($id);
        $request->validate([
            'title' => 'required|max:100',
            'category' => 'required|max:100',
            'youtube_url' => 'required|url',
            'description' => 'required',
        ]);
        $video->update([
            'title' => $request->title,
            'category' => $request->category,
            'youtube_url' => $request->youtube_url,
            'description' => $request->description,
        ]);
        return redirect()
            ->route('workout-videos.index')
            ->with('success', 'Workout Video Updated Successfully');
    }
    public function destroy($id)
    {
        if (!Auth::check() || Auth::user()->role != 'admin') {
            abort(403, 'Unauthorized');
        }
        $video = WorkoutVideo::findOrFail($id);
        $video->delete();
        return redirect()
            ->route('workout-videos.index')
            ->with('success', 'Workout Video Deleted Successfully');
    }
}