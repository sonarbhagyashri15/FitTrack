<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    // Attendance List
    public function index()
    {
        if (Auth::user()->role == 'admin') {

            $attendance = Attendance::with('user')
                ->latest()
                ->get();

        } else {

            $attendance = Attendance::with('user')
                ->where('user_id', Auth::id())
                ->latest()
                ->get();

        }

        return view('attendance.index', compact('attendance'));
    }

    // Add Attendance Form (Admin Only)
    public function create()
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }

        $users = User::all();

        return view('attendance.create', compact('users'));
    }

    // Store Attendance (Admin Only)
    public function store(Request $request)
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }

        $request->validate([
            'user_id' => 'required',
            'attendance_date' => 'required|date',
            'status' => 'required'
        ]);

        Attendance::create([
            'user_id' => $request->user_id,
            'attendance_date' => $request->attendance_date,
            'status' => $request->status
        ]);

        return redirect()
            ->route('attendance.index')
            ->with('success', 'Attendance Added Successfully.');
    }

    // Edit Attendance (Admin Only)
    public function edit($id)
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }

        $attendance = Attendance::findOrFail($id);
        $users = User::all();

        return view('attendance.edit', compact('attendance', 'users'));
    }

    // Update Attendance (Admin Only)
    public function update(Request $request, $id)
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }

        $request->validate([
            'user_id' => 'required',
            'attendance_date' => 'required|date',
            'status' => 'required'
        ]);

        $attendance = Attendance::findOrFail($id);

        $attendance->update([
            'user_id' => $request->user_id,
            'attendance_date' => $request->attendance_date,
            'status' => $request->status
        ]);

        return redirect()
            ->route('attendance.index')
            ->with('success', 'Attendance Updated Successfully.');
    }

    // Delete Attendance (Admin Only)
    public function destroy($id)
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }

        $attendance = Attendance::findOrFail($id);

        $attendance->delete();

        return redirect()
            ->route('attendance.index')
            ->with('success', 'Attendance Deleted Successfully.');
    }
}