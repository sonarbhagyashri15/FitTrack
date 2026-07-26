<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\MembershipPlan;
use App\Models\UserMembership;
use App\Models\WorkoutPlan;
use App\Models\WorkoutVideo;
use App\Models\Progress;
class AdminController extends Controller
{    public function index()
    {
        $totalUsers = User::count();
        $totalPlans = MembershipPlan::count();
        $totalMemberships = UserMembership::count();
        $activeMemberships = UserMembership::where('status', 'active')->count();
        $totalWorkoutPlans = WorkoutPlan::count();
        $totalWorkoutVideos = WorkoutVideo::count();
        $totalProgress = Progress::count();
        return view('admin.dashboard', compact(
            'totalUsers',
            'totalPlans',
            'totalMemberships',
            'activeMemberships',
            'totalWorkoutPlans',
            'totalWorkoutVideos',
            'totalProgress'
        ));
    }
}